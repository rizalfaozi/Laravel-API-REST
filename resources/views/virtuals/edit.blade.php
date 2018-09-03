@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Virtual
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($virtual, ['route' => ['virtuals.update', $virtual->id], 'method' => 'patch']) !!}

                        @include('virtuals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection