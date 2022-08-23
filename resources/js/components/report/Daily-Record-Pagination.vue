<template>

    <span class="title">Daily Record </span>
    <span class="actionbar">
        <span class="actionbar-info">Summary </span>
        <!-- <span class="actionbar-info">increment {{increment}} </span>
        <span class="actionbar-info">offset {{offset}} </span> -->
        <button 
            :disabled="disablePrevious"
            class="actionbar-action btn" 
            @click.stop="fetchPrevious">
            Previous
        </button>
        <button
            :disabled="disableNext"
            class="actionbar-action btn"
            @click.stop="fetchNext">
            Next
        </button>
    </span> 
   <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Foods Taken</th>
                <th>Total calories</th>
                <th width="10%">View</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item,index) in records">
                <td>{{item.formatted_date}}</td>
                <td>{{item.total_foods}}</td>
                <td>{{ new Intl.NumberFormat('en-US').format(item.total_calories)}}</td>
                <td class="td-centered">
                    <a @click=changeRoute(item.date) ><i class="icon icon-arrow-right2"></i></a>
                </td>
            </tr>
        </tbody>
   </table>

   <div class="panel panel-justify-right panel-paddingless">

        <button :disabled="disablePrevious" class="" @click.stop="fetchPrevious">
            <i class="icon icon-circle-left"></i>
            Previous
        </button>
        <button 
            class="btn-primary" 
            :disabled="disableNext"
            @click.stop="fetchNext">
            <i class="icon icon-circle-right"></i>
            Next
        </button>
   </div>
</template>

<script>

import { onMounted, reactive, ref } from 'vue'
import { onBeforeMount } from 'vue'


export default{
    setup(){
        let title = "Paginated Table"
        let records = ref([])

        let changeRoute = function(date){
            window.location = route('report.daily.specific',date)
        }

        let disablePrevious = ref(true)
        let disableNext = ref(false)
        let offset = ref(0);
        let increment = 7;
        // let current = 



        let fetchNext = async () =>{
            // we check first if the next data has value before we increment
            

            offset.value += increment
            disablePrevious.value=false
            let url = `/fetch/report/daily/offset=${offset.value}/increment=${increment}`
            
            fetch(url)
                .then(res => { return res.json() })
                .then(data => {

                    let checkNextURL = `/fetch/report/daily/offset=${offset.value+increment}/increment=${increment}`
                    fetch(checkNextURL)
                        .then(res => { return res.json() })
                        .then(nextData => {
                            if ( nextData.length <= 0 ){
                                disableNext.value = true;
                            }
                                
                            if ( data.length > 0 ){
                                records.value = data    
                            }   

                        })
                        .catch(e => console.log(e));

                    
                })
                .catch(e => console.log(e));
        
            // peek if there are next dat
            
        }

        let fetchPrevious = ()=>{

            disableNext.value=false
            if ( offset.value < increment ){
                increment = offset.value
            }

            // here we subtract data already
            offset.value -= increment
            if ( offset.value <= 0 ) {
                disablePrevious.value = true
            }

            let url = `/fetch/report/daily/offset=${offset.value}/increment=${increment}`
            fetch(url)
                .then(res => { return res.json() })
                .then(data =>{
                    records.value = data
                })
                .catch(e => console.log(e));

        }


        // load initial data
        onBeforeMount(()=>{
            let url = `/fetch/report/daily/offset=${offset.value}/increment=${increment}`
            fetch(url)
                .then(res => { return res.json() })
                .then(data => {
                    if ( data.length > 0 ){
                        records.value = data    
                    }
                })
                .catch(e => console.log(e));
        })

        return {
            disablePrevious,
            disableNext,
            title,
            offset,
            records,
            changeRoute,
            fetchNext,
            fetchPrevious,
            increment
        }
    }
}
</script> 