@extends('layouts/master')

@section('title', 'Missed Articles - S4MCMS')


@section('content')

<div class="panel">
    <div class="panel-content filler">
        <div class="panel-logo"></div>
        <div class="panel-header">
            <h1><small>Missed Articles</small></h1>

        </div>
        <div class="panel-search container-fluid">
            <form class="form-horizontal" method="get" action="">
                
                @if($selectedNewType)
                <input type="hidden" name="newstype" value="{{$selectedNewType}}"/>
                @endif
                <input id="panelSearch"  required  placeholder="Search" value="{{ isset($_GET['keyword']) ? $_GET['keyword']:'' }}" type="text" name="keyword">

                <button class="btn btn-search" type="submit"></button>
                @if(isset($_GET['searchin'])) 
                <a href="{{url("article/list/published")}}@if($selectedNewType)&newstype={{$selectedNewType}} @endif"><button class="btn btn-xs" type="button"><i class="icon-refresh"></i></button></a>
                @endif

                <label class="radio">
                    <input type="radio"  @if(isset($_GET['searchin'])) @if($_GET['searchin']=='title') checked @endif @endif required name="searchin" class="uniformRadio" value="title">
                           Search by Article Title
                </label>
                <label class="radio">
                    <input type="radio" @if(isset($_GET['searchin'])) @if($_GET['searchin']=='article_id') checked @endif @endif required name="searchin" class="uniformRadio" value="article_id">
                           Search by Article ID
                </label>
                <label class="radio">
                    <input type="radio" @if(isset($_GET['searchin'])) @if($_GET['searchin']=='author') checked @endif @endif required name="searchin" class="uniformRadio" value="author">
                           Search by Reporter Name
                </label>
                <label class="radio">
                    <input type="radio" @if(isset($_GET['searchin'])) @if($_GET['searchin']=='published') checked @endif @endif required name="searchin" class="uniformRadio" value="published">
                           Search by Published date
                </label>

            </form>
        </div>



        <script>
            $().ready(function () {
                $(".uniformRadio").uniform({
                    radioClass: 'uniformRadio'
                });
                
                $('input[name=searchin]').change(function(){
                    //alert();
                    
                    if($('input[name=searchin]:checked').val()=='published'){
                         $("#panelSearch" ).val('');
                         $("#panelSearch").datepicker
                         ({                                           
                            dateFormat: "yy-mm-dd"
                          });
                    }else{
                           // $( "#panelSearch" ).datepicker( "option", "disabled", true );
                          
                           $("#panelSearch" ).datepicker("destroy");
                        }
                    
                });
                
                
                $("#channel_sel").change(function () {
                    $(this).find("option:selected").each(function () {

                        if ($(this).attr("value").trim().length != 0) {

                            window.location = '{{url("article/list/published")}}' + '?channel=' + $(this).attr("value").trim();
                        }

                        else if ($(this).attr("value") == "none") {

                            $("#quote_list").hide();

                        }

                    });

                });
                
                
                
                $("#newstype").change(function () {
                    
                    $(this).find("option:selected").each(function () {

                        if ($(this).attr("value").trim().length != 0) {

                            window.location = '{{url("article/list/published")}}' + '?channel=' + $('#channel_sel').attr("value").trim()+'&newstype='+$(this).attr("value");
                        }

                        else {

                             window.location = '{{url("article/list/published")}}' + '?channel=' + $('#channel_sel').attr("value").trim();

                        }

                    });

                });
                
                

            });
        </script>
        <br><br><br><br><br><br>
        <div class="panel-header">
            <!--<h1><small>Page Navigation Shortcuts</small></h1>-->
        </div>
        <script type="text/javascript">
            $(function () {
                $("#jstree").jstree({
                    "json_data": {
                        "data": [
                            {
                                "data": {
                                    "title": "Missed Articles",
                                    "attr": {"href": "#Basic_Non-responsive_Table"}
                                }
                            },
                        ]
                    },
                    "plugins": ["themes", "json_data", "ui"]
                })
                        .bind("click.jstree", function (event) {
                            var node = $(event.target).closest("li");
                            document.location.href = node.find('a').attr("href");
                            return false;
                        })
                        .delegate("a", "click", function (event, data) {
                            event.preventDefault();
                        });
            });
        </script>
        <div class="sidebarMenuHolder">
            <div class="JStree">
                <div class="Jstree_shadow_top"></div>
                <div id="jstree"></div>
                <div class="Jstree_shadow_bottom"></div>
            </div>
        </div>    </div>
    <div class="panel-slider">
        <div class="panel-slider-center">
            <div class="panel-slider-arrow"></div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="breadcrumb-container">
        <ul class="xbreadcrumbs">
            <li>
                <a href="/dashboard">
                    <i class="icon-photon home"></i>
                </a>
            </li>
            <li class="current">
                <a href="javascript:;">Missed Articles</a>
            </li>
        </ul>
    </div>           <header>
        <i class="icon-big-notepad"></i>
        <h2><small>Missed Articles</small></h2>
    </header>

    <form class="form-horizontal">

        <div class="container-fluid" id="notificationdiv"  @if((!Session::has('message')) && (!Session::has('error')))style="display: none" @endif >

             <div class="form-legend" id="Notifications">Notifications</div>

            <!--Notifications begin-->
            <div class="control-group row-fluid" >
                <div class="span12 span-inset">
                    @if (Session::has('message'))
                    <div class="alert alert-success alert-block" style="">
                        <i class="icon-alert icon-alert-info"></i>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>This is Success Notification</strong>
                        <span>{{ Session::get('message') }}</span>
                    </div>
                    @endif

                    @if (Session::has('error'))
                    <div class="alert alert-error alert-block">
                        <i class="icon-alert icon-alert-info"></i>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>This is Error Notification</strong>
                        <span>{{ Session::get('error') }}</span>
                    </div>
                    @endif
                </div>
            </div>
            <!--Notifications end-->

        </div>

        <div class="container-fluid">

            <!--Sortable Non-responsive Table begin-->
            <div class="row-fluid">
                <div class="span12">
                    <table class="table table-striped" id="tableSortable">
                        <thead>
                            <tr>
                                <th>Article ID</th>
                                <th>Title</th>
                                <th>Reporter Name</th>
                                <th>Date,Time</th>
                                <th><input type="checkbox" class="uniformCheckbox" value="checkbox1" id="selectall"></th>
                            </tr>
                        </thead>
                        <tbody>
<!--                            <tr class="gradeX">
                            <td><a href="create-new-articles.html">234567890987654</a> <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Published by: Sharabani Mukherjee."><i class="icon-photon info-circle"></i></a></td>
                            <td><a href="create-new-articles.html">English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay</a>
                            </td>
                            <td><a href="create-new-articles.html">Brigadier CHITRANJAN SAWANT,VSM</a></td>
                            <td class="center"><a href="create-new-articles.html">11/03/2013</a>
                                <a href="create-new-articles.html">12:13 pm</a>
                            </td>
                            <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                        </tr>-->
                            @foreach($articles as $article)
                            <tr class="gradeX"  id="rowCur{{$article->article_id}}">
                                <td><a href="{{url('')}}/article/{{ $article->article_id }}">{{ $article->article_id }}</a> <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Published by: {{ $article->name }}"><i class="icon-photon info-circle"></i></a></td>
                                <td><a href="{{url('')}}/article/{{ $article->article_id }}">{{ $article->title }}</a>
                                </td>
                                <td><a href="{{url('')}}/article/{{ $article->article_id }}">{{ $article->name }}</a></td>
                                <td class="center"><a href="/article/{{ $article->article_id }}">{{ $article->publish_date }}</a>
                                    <a href="{{url('')}}/article/{{ $article->article_id }}">{{ $article->publish_time }}</a>
                                </td>
                                <td class="center"> <input type="checkbox" class="uniformCheckbox" name="checkItem[]" value="{{ $article->article_id }}"></td>
                            </tr>
                            @endforeach
                            <!--
                               <tr class="gradeC">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                               <tr class="gradeA">
                                   <td>234567890987654 <a href="javascript:;" class="bootstrap-tooltip" data-placement="top" data-original-title="Submitted on 14 December 2013."><i class="icon-photon info-circle"></i></a></td>
                                   <td>English poetry is receiving lesser attention these days: Aju Mukhopadhyay English poetry is receiving lesser attention these days: Aju Mukhopadhyay
                                   </td>
                                   <td> Brigadier CHITRANJAN SAWANT,VSM</td>
                                   <td class="center">11/03/2013</td>
                                   <td class="center"> <input type="checkbox" class="uniformCheckbox" value="checkbox1"></td>
                               </tr>
                            -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Sortable Non-responsive Table end-->


            <script>
                $(document).ready(function () {
                    $('#tableSortable').dataTable({
                        bInfo: false,
                        bPaginate: false,
                        "aaSorting": [],
                        "aoColumnDefs": [{"bSortable": false, "aTargets": [4]}],
                        "fnInitComplete": function () {
                            $(".dataTables_wrapper select").select2({
                                dropdownCssClass: 'noSearch'
                            });
                        }
                    });
                    //                            $("#simpleSelectBox").select2({
                    //                                dropdownCssClass: 'noSearch'
                    //                            });
                    $('#selectall').click(function () {
                        if ($(this).is(':checked')) {
                            $('input[name="checkItem[]"]').each(function () {
                                $(this).attr('checked', 'checked');
                            });
                        } else {
                            $('input[name="checkItem[]"]').each(function () {
                                $(this).removeAttr('checked');
                            });
                        }
                    });
                });

                function deleteArticle() {
                    var ids = '';
                    var checkedVals = $('input[name="checkItem[]"]:checkbox:checked').map(function () {
                        //var row = 'rowCur' + this.value;
                        //$("#" + row).hide();
                        return this.value;
                    }).get();
                    if (checkedVals.length > 0) {
                        var ids = checkedVals.join(",");
                        //alert(ids);return false;
                        $.get("{{ url('/article/delete/')}}",
                                {option: ids},
                        function (data) {
                            if (data.trim() == 'success') {
                                $.each(checkedVals, function (i, e) {
                                    var row = 'rowCur' + e;
                                    $("#" + row).hide();
                                });
                                location.reload();
                                $('#notificationdiv').show();
                                $('#notificationdiv .control-group .span12.span-inset').html('<div class="alert alert-success alert-block">\n\
                            <i class="icon-alert icon-alert-info"></i><button type="button" class="close" data-dismiss="alert">\n\
                            &times;</button><strong>This is Success Notification</strong>\n\
                            <span></span>Selected records dumped.</div>');
                            } else {
                                alert(data);
                            }
                            //alert(1);
                        });
                    } else {
                        alert('Please select at least one record.');
                    }
                }

            </script>
            <div class="dataTables_paginate paging_bootstrap pagination">

                {!! $articles->appends(Input::get())->render() !!}
            </div>
        </div><!-- end container -->


        <div class="control-group row-fluid">
           
        </div>
    </form>
</div>
@stop