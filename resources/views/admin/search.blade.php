@extends('admin.master')
@include('admin.navbar')

<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Image</th>
                <th>name</th>
                <th>contacts</th>
                <th>lichnie dannye</th>
                <th>skills</th>
                <th>EDIT</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($models as $model)
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox" value="{{$model->id}}" name="ids[]">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td>{{$model->id}}<img src="{{ url('images',$model->images)}}" style="width: 90px; height: 90px;"></td>
                <td>{{$model->name}} {{$model->surname}} {{$model->fathersname}}</td>
                <td>
                    <span class="block-email">{{$model->email}},{{$model->phone}}, {{$model->social_acc}}</span>
                </td>
                <td class="desc">age:{{$model->age}}, height:{{$model->height}}, weight:{{$model->weight}},</td>
                <td>sport: {{$model->skill_sport}},skill_fight_art: {{$model->skill_fight_art}},skill_dance: {{$model->skill_dance}},skill_instrumental: {{$model->skill_instrumental}},skill_car_ride: {{$model->skill_car_ride}} </td>
                
                
                <td>
                    <div class="table-data-feature">
                        <a class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </a>
                        <a class="item btn-warning btn "  href="{{action('ModelsController@edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                            
                        </a>


                        <form action="{{action('ModelsController@destroy', $model->id)}}" method="post">
				          {{csrf_field()}}
				          <input name="_method" type="hidden" value="DELETE">
				          <button class="btn item btn-danger" type="submit"><i class="zmdi zmdi-delete"></i></button>
				          
				        </form>
                      
                    </div>
                </td>
            </tr>
            
            @endforeach
            
        </tbody>
    </table>
    
    
</div>
