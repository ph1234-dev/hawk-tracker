@extends("/template")

@section("content")
<div class="component-container" style="display: flex; flex-direction: column; gap: var(--padding-top)">
    <span class="text-title">All Record</span>
    <p>Here is what you have taken so far. Good Job!</p>

    <span class="breadcrumb">
        <span class="breadcrumb-info">
            <span>Food consumed <span class="tag">{{$total_food}}</span> </span>
            <span>Calories Consumed <span class="tag">{{$total_calories}}</span> </span> 
            <span>Target Calories <span class="tag">{{$target_calories}}</span>  </span>
        </span>
        <span class="breadcrumb-actions">
            <span>
                <a href="{{route('show.food.form')}}"><i class="icon icon-fire"></i>&nbsp;Go Home</a>
            </span>
            <span class="breadcrumb-actions-icon-primary">
                <a href="{{route('show.food.form')}}"><i class="icon icon-box-add"></i>&nbsp;Add More</a>
            </span>
        </span>
    </span>

    @isset($records)
        <table>
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Calorie </th>
                    <th>Pieces</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $data)
                    <tr>
                        <td>{{$data->food}}</td>
                        <td>{{number_format($data->calories)}}</td>
                        <td>{{$data->pieces}}</td>
                        <td>{{$data->comment}}</td>
                        <td>{{$data->date}}</td>
                        <td>
                            <span>
                                <a href="{{route('delete.stored.food',$data->id)}}"><i class="icon-bin"></i>&nbsp;Delete</a>
                                &nbsp;
                                <a href="{{route('show.food.update.page',$data->id)}}"><i class="icon-pencil"></i>&nbsp;Update</a>
                            </span>
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