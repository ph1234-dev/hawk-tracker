@extends("/template")

@section("content")
<div class="container">

    <span class="title-big">User Records</span>
    <p>Here is what you have recorded today.</p>
    {{-- <script>alert("wtf")</script> --}}
    {{-- inject vue js component here --}}

    <span class="actionbar">
        {{-- <span>Summary <b>&#187;</b></span> <b>&#187;</b>  --}}
        
        <span class="actionbar-info">Consumed {{$total_calories}} cal</span>
        <span class="actionbar-info">Target {{$target_calories}} cal</span>
        <a class="actionbar-action" href="{{route('show.food.form')}}"> 
            <b>+</b>&nbsp;Add Record
        </a>
    </span> 

    @isset($records)
        <table>
            <thead>
                <tr>
                    <th width="20%">Food</th>
                    <th width="15%">Calories</th>
                    <th width="15%">Pieces</th>
                    <th >Comments</th>
                    <th width="20%" >Date</th>
                    {{-- <th>Date</th> --}}
                    <th width="5%">Delete</th>
                    <th width="5%">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $data)
                    <tr>
                        <td>{{$data->food}}</td>
                        <td>{{number_format($data->calories)}}</td>
                        <td>{{$data->pieces}}</td>
                        <td>{{$data->comment}}</td>
                        <td>{{ date('M d, Y', strtotime($data->date))}}</td>
                        <td class="td-centered">
                            <a class="action" href="{{route('delete.stored.food',$data->id)}}">
                                <i class="icon  icon-bin"></i>
                            </a>
                        </td>
                        <td class="td-centered">
                            <a class="action" href="{{route('show.food.update.page',$data->id)}}">
                                <i class="icon icon-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div style=" display: flex; justify-content: center; align-items: center">

            <span style="margin: auto">{{$records->links()}}</span>
            <style>
                /* [aria-label="Pagination Navigation"]{
                    background: indigo;
                } */
                [aria-label="Pagination Navigation"]{
                    /* background: indigo;      */
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;       
                    gap: 1ch;    
                }

                /* numeric keyboard items */
                .z-0{
                    display: flex;     
                    gap: 2ch;    
                }

                [aria-label="Pagination Navigation"] [aria-current="page"]{
                    background: var(--primary-color);
                }

                [aria-label="Pagination Navigation"] [aria-current="page"] > *{
                    color: rgba(245,245,245,.95)
                }

                /* select all numbers in pagination*/
                .z-0 > * {
                    /* background: orange; */
                    width: 3ch !important;
                    height: 3ch !important;
                    border-radius: 100%;

                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .z-0 > *:first-child,
                .z-0 > *:last-child{
                    /* background: transparent; */
                    /* display: none; */
                }

                .w-5{
                    /* display: none; */
                }


                /* the hide the control prev and next */
                .flex.justify-between.flex-1{
                    display: none;
                }

                /*  */
                .relative.z-0.inline-flex.shadow-sm.rounded-md{
                    margin-top: .666666rem;
                }
            </style>
        </div>

    @endisset

</div>
@endsection