@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>{{trans('words.lightservices')}}</span>
        </h2>
    </div>
@endsection

@section('js')
    @parent
@endsection

@section('left')
    {!! Form::open(['action' => ['Admin\LightServiceController@store'], 'method' => 'post'], ['class'=>'']) !!}
    <h1>{{trans('words.add') . trans('words.lightservice')}}</h1>
    @include('admin.module.lightservice.add-edit')
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>{{trans('words.lightservices')}}</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>{{ trans('word.name') }}</th>
                <th>{{ trans('word.price') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($lightservices as $lightservice)
                <tr class="gradeU">
                    <td>
                        <a href="{{ action('Admin\LightServiceController@show',$lightservice->id)}}">{{ $lightservice->name }} </a>
                    </td>
                    <td class="f18">{{ $lightservice->price }}</td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\LightServiceController@destroy',$lightservice->id)}}">
                            <i class="fa fa-close "></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])
    </div>

@endsection
