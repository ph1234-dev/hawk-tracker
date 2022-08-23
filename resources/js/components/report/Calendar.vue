<template>

    <div class="panel panel-vertical panel-paddingless">
        <span class="title">{{currentMonth}}</span>
        <div>
            <a id="calendar-get-prev-month" 
                @click.stop="getPrevMonth">
                <i class="icon icon-arrow-left2"></i>
                &nbsp;Prev&nbsp;
            </a>
             <span> {{currentDate}} </span>
            <a id="calendar-get-next-month" 
                @click.stop="getNextMonth">
                 &nbsp;Next&nbsp;<i class="icon icon-arrow-right2"></i>
               
            </a>
        </div>
    </div>
    <div id="calendar" class="calendar">
        <div class="calendar-head">
            <span>Sun</span>
            <span>Mon</span>
            <span>Tue</span>
            <span>Wed</span>
            <span>Thu</span>
            <span>Fri</span>
            <span>Sat</span>
        </div>
        <div id="calendar-body" class="calendar-body"></div>
    </div>
</template>

<script>

import { onMounted, reactive, ref, render } from 'vue'

export default{

    setup(){

        let calendarData = []
        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
            ]
            
        const date = new Date()
        let currentMonth = ref(months[date.getMonth()])
        let currentDate = ref(date.toDateString())
        
        let render = ()=>{

            
            // tutorial for setting month   
            // https://www.youtube.com/watch?v=o1yMqPyYeAo&t=2170s&ab_channel=CodeAndCreate

            let findCalendarCalories = day=>{
                let cal = "";

                for ( let i=0 ; i < calendarData.length; i++){
                    let flag = calendarData[i]
                    if ( flag.date == day ){
                        cal =  flag.calories
                         break  
                    }
                }

                return  cal
            }

            let monthDays = document.querySelector('#calendar-body')
            monthDays.innerHTML="";

            // const date = new Date()
            // returns the first day of the month given the year
            // changing 1 into zero here gets the last day of the previous month
            // so we add 1 to get the last day of the current month
            const lastDayCurrentMonth = new Date(
                date.getFullYear(),
                date.getMonth()+1,
                0).getDate() 

            // it will return the index of the week
            // this will be needed to display the days 
            // of the following month
            const lastDayCurrentMonthIndex = new Date(
                date.getFullYear(),
                date.getMonth()+1,
                0).getDay() 
            
            const lastDayPrevMonth = new Date(
                date.getFullYear(),
                date.getMonth(),
                0).getDate() 


            // set the first day of the month since we specified
            // that today is the date
            date.setDate(1)
            
            // returns the day (mon, tue...)
            let firstDayIndex = date.getDay() 

            // set days of the previous month
            for ( let day = firstDayIndex; day >0; day--){
                monthDays.insertAdjacentHTML(
                    "beforeend",
                    `<div class="calendar-extra-days">
                        <span class="calendar-day">
                            ${lastDayPrevMonth - day + 1}
                        </span>
                    </div>`)
            }

            // set days of the current month
            for ( let day = 1 ; day <= lastDayCurrentMonth; day++){
                // days += `<div>${i}</div>`
                if ( day === new Date().getDate() && date.getMonth()=== new Date().getMonth()){
                    monthDays.insertAdjacentHTML(
                        "beforeend",
                        `<div class="calendar-current-day">
                            <span class="calendar-day">${day}</span>
                            <span class="calendar-info">
                                ${ 
                                    typeof findCalendarCalories(day) === 'number'? 
                                    new Intl.NumberFormat('en-US').format(findCalendarCalories(day)) + ` cal`
                                    : findCalendarCalories(day) 
                                 }  
                            </span>
                        </div>`)
                }else{

                    monthDays.insertAdjacentHTML(
                        "beforeend",
                        `<div>
                            <span class="calendar-day">${day}</span>
                            <span class="calendar-info">
                                ${ 
                                    typeof findCalendarCalories(day) === 'number'? 
                                    new Intl.NumberFormat('en-US').format(findCalendarCalories(day)) + ` cal`
                                    : findCalendarCalories(day)
                                 }  </span>
                        </div>`
                    )
                }
            }

            // set days of the next month
            const nextDays = 7 - lastDayCurrentMonthIndex
            for ( let day = 1; day < nextDays; day++){
                monthDays.insertAdjacentHTML(
                "beforeend",
                `<div class="calendar-extra-days">
                    <span class="calendar-day">
                        ${day}
                    </span>
                </div>`)
            }
        }
        
        let loadData = async ()=>{
            
            // alert(date.getMonth())
            let currentMonthIndex = date.getMonth() + 1;
            let checkNextURL = `/fetch/report/calories/per/day/month=${currentMonthIndex}`
            
            await fetch(checkNextURL)
                .then(res => {
                    console.log(res)
                    return res.json() })
                .then(data => {
                    calendarData = data
                    // console.log(JSON.stringify(calendarData))
                    // alert(nextData)
                }).catch(e => console.log(e));


            // step 1. 
            // get data from dtabase first

        }
        onMounted(async ()=>{

            await loadData()
            render()
        })
        
        let getNextMonth = async ()=>{
            date.setMonth(date.getMonth()+1)
            currentMonth.value = months[date.getMonth()]
            currentDate.value = date.toDateString()
            await loadData()
            render()
        }

        
        let getPrevMonth = async ()=>{
            date.setMonth(date.getMonth()-1)
            currentMonth.value = months[date.getMonth()]
            currentDate.value = date.toDateString() 
            await loadData()
            render()
        }

        return{
            currentMonth,
            currentDate,
            getNextMonth,
            getPrevMonth
        }
    }
}


// onMounted(()=>{

//             // https://www.youtube.com/watch?v=krOTeX1DqHI&ab_channel=JadJoubran
//              const isWeekend  = day=>{
//                         // 7 %= 6 is sat
//                         // 7 %= 0 is sun
//                         // since we start with sunday as 1
//                         return  day % 7 == 0 || day % 7 == 1
//                     }
//             const getDayName = day=>{
//                 const date = new Date(Date.UTC(2022,0,day+1))
//                 const options = {weekday:"short"}
//                 const dayName = new Intl.DateTimeFormat('en-US',options).format(date);
//                 return dayName
//             }
//             let calendarBody = document.querySelector("#calendar-body")
//             for (let day=1; day<=31; day++){

//                 const dayName = getDayName(day)
              
//                 calendarBody.insertAdjacentHTML(
//                     "beforeend",
//                     `<div 
//                         class="${isWeekend(day) ? "calendar-weekend" : "calendar-day"}">
//                         ${dayName}
//                         ${day}
//                     </div>`)
//             }
//         })
</script>