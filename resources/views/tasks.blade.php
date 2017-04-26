@extends('layouts.app')<!--views/layouts/app.blade.php -->

@section('content')

<!-- Bootstrap шаблон... -->
<div class="text-left col-md-offset-2 main-header">
    Продукты
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
            <label for="task" class="col-sm-3 control-label">Цена</label>

            <div class="col-sm-6">
                <input type="number" min="0" name="price" id="price" class="form-control">
            </div>


        </div>
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Описание</label>

            <div class="col-sm-6">
                <textarea class="form-control" name="description" id="description"></textarea>
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

<!-- TODO: Текущие задачи -->

@if (count($tasks) > 0)
<div class="panel panel-default">

    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Заголовок таблицы -->
          

            <!-- Тело таблицы -->
            <tbody>
                @foreach ($tasks as $task)
                <tr id="product_content">
                    <!-- Имя задачи -->
                    <td class="table-text" style="width: 60%" >
                        <div id="product_name">{{ $task->name }}
                      
                        <div class="product_price">   <br>Цена:{{ $task->price }}</div>
                     
                        <div class="product_description">   <br>Описание:{{ $task->description }}</div></div>
                       
                    </td>
      
                        


                    <td>
                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn ">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif
@endsection