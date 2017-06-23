@extends('layouts.app')<!--views/layouts/app.blade.php -->

@section('content')

<!-- Bootstrap шаблон... -->
<div class="text-left col-md-offset-2 main-header">
   Добавление Пацыков
</div>
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Имя</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control">
            </div>


        </div>
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Должность</label>

            <div class="col-sm-6">
                <input type="text" name="place" id="place" class="form-control">
            </div>



        </div>
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Когда бухать</label>

            <div class="col-sm-6">
                <input type="text" name="dateofbirthday" id="dateofbirthday" class="form-control">
            </div>


        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn ">
                    &nbsp;&nbsp; <i class="material-icons">add</i>&nbsp;&nbsp; &nbsp;
                </button>
            </div>
        </div>
    </form>
</div>
<style>
    .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.8);
        z-index: 99999;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        display: none;
        pointer-events: none;

    }
    .modalDialog:target {
        display: block;
        pointer-events: auto;
    }

    .modalDialog > div {
        width: 400px;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        background: -moz-linear-gradient(#fff, #999);
        background: -webkit-linear-gradient(#fff, #999);
        background: -o-linear-gradient(#fff, #999);
    }

    .close{
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }
    .close:hover { background: #00d9ff; }
    a{
        color:gray
    }
</style>
<!-- TODO: Текущие задачи -->

@if (count($tasks) > 0)
<div class="panel panel-default" style="width: 80%; margin-left: 10%;">

    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Заголовок таблицы -->


            <!-- Тело таблицы -->
            <tbody>
                @foreach ($tasks as $task)
            <div id="update-{{ $task->id }}" class="modalDialog">
                <div class="well well-sm">
                    <div>
                        <a href="#close" title="Close" class="close">X</a>
                        <fieldset>
                            @include('common.errors')
                            <legend class="text-center">Редактировать Пацыка</legend>
                            <form action="{{ url('/task/update/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                <input type="hidden" value="{{ $task->id }}" name="id"><br>
                               <label  class="">Должность</label>
                                   <input type="text" class="form-control" value="{{ $task->place }}" id="newplace" name="newplace"><br>
                                <label  class="">Имя</label>
                                
                                <input class="form-control" type="text" value="{{ $task->name }}" id="newname" name="newname"><br>       
                                <label  class="">Когда бухать</label>
                                
                                <input type="text" class="form-control" value="{{ $task->dateofbirthday }}" id="newdateofbirthday" name="newdateofbirthday"><br>
                                
                             

                                
                                
                                <button type="submit" id="save" class="btn  ">
                                    <i class="fa fa-"></i> сохранить
                                </button>        
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
            <tr id="product_content">
                <!-- Имя задачи -->
                <td class="table-text" style="width: 60%" >
                    <input type="hidden" value="{{ $task->id }}" name="id"><br>
                    <div id="product_name">{{ $task->name }}

                        <div class="product_price">   <br>Должность:{{ $task->place }}</div>

                        <div class="product_description">   <br>Когда бухать:{{ $task->dateofbirthday }}</div></div>

                </td>




                <td style="padding-left: 70%">
                    <form action="{{ url('task/delete/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="">
                        <button type="submit" class="btn ">
                            <i class="material-icons">delete</i>
                        </button>
                        </a>
                    </form>

                    
                    <a href="#update-{{ $task->id }}" class="table_edit" title="Редактировать">
                        <button type="submit" class="btn">
                            <i class=" material-icons ">edit</i>
                        </button>
                    </a>

                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif
@endsection