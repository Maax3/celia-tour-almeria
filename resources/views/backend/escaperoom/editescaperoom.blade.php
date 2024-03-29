@extends('layouts.backend')

@section('headExtension')
    <link rel="stylesheet" href="{{url('css/zone/zonemap/zonemap.css')}}" />
    <link rel="stylesheet" href="{{url('css/escaperoom/index.css')}}" />
    <link rel="stylesheet" href="{{url('css/jPages.css')}}" />
    <link rel="stylesheet" href="{{url('css/searchbox.css')}}" />
    <script src="{{url('js/marzipano/es5-shim.js')}}"></script>
    <script src="{{url('js/marzipano/eventShim.js')}}"></script>
    <script src="{{url('js/marzipano/requestAnimationFrame.js')}}"></script>
    <script src="{{url('js/marzipano/marzipano.js')}}"></script>
    <script src="{{url('js/escaperoom/modalResources.js')}}"></script>
    <script src="{{url('js/question/index.js')}}"></script>
    <script src="{{url('js/optionsEscapeRoom/index.js')}}"></script>
    <script src="{{url('js/key/index.js')}}"></script>
    <script src="{{url('js/clue/index.js')}}"></script>
    <script src="{{url('js/jqexpander.js')}}"></script>
    <script src="{{url('js/jPaginate.js')}}"></script>
    <script src="{{url('js/filter.js')}}"></script>

    {{-- Necesario apra el editor de textos enriquecidos --}}
    <script src="{{url('js/scripts/demos.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxcore.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxbuttons.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxscrollbar.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxlistbox.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxdropdownlist.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxdropdownbutton.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxcolorpicker.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxwindow.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxeditor.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxtooltip.js')}}"></script>
    <script src="{{url('js/jqwidgets/jqxcheckbox.js')}}"></script>
    <meta name="description" content="This sample demonstrates how we can localize the jQWidgets Editor tools.">
    <link rel="stylesheet"  href="{{url('js/jqwidgets/styles/jqx.base.css')}}" type="text/css" />
    <link rel="stylesheet"  href="{{url('js/jqwidgets/styles/jqx.ligth.css')}}" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	

    <script type="text/javascript">
        $(document).ready(function () {
            $('.editor').jqxEditor({
                height: 255,
                width: '100%',
                localization: {
                    "bold": "Fett",
                    "italic": "Kursiv",
                    "underline": "Unterstreichen",
                    "format": "Block-Format",
                    "font": "Schriftname",
                    "size": "Schriftgröße",
                    "color": "Textfarbe",
                    "background": "Hintergrundfarbe",
                    "left": "Links ausrichten",
                    "center": "Mitte ausrichten",
                    "right": "Rechts ausrichten",
                    "outdent": "Weniger Einzug",
                    "indent": "Mehr Einzug",
                    "ul": "Legen Sie ungeordnete Liste",
                    "ol": "Geordnete Liste einfügen",
                    "image": "Bild einfügen",
                    "link": "Link einfügen",
                    "html": "html anzeigen",
                    "clean": "Formatierung entfernen"
                }
            });
        });
    </script>

    <link rel="stylesheet" href="{{url('css/question/question.css')}}" />
    <link rel="stylesheet" href="{{url('css/guidedVisit/scene.css')}}" />

    <!-- URL GENERADAS PARA SCRIPT -->
    <script>
        // Para las urls con identificador se asignara 'insertIdHere' por defecto para posteriormente modificar ese valor.
        const questionDelete = "{{ route('question.destroy', 'insertIdHere') }}";
        const questionEdit = "{{ route('question.edit', 'insertIdHere') }}";
        //Variable booleana para comprobar que se tenga que ejecutar o no 
        //el código de selección múltiple de escenas
        var multiple = false;
    </script>
    <style>
        #confirmDeleteK,#confirmDeletePista{
            width: 20%!important;
        }
        #confirmDelete{
            width: 25%!important;
        }
    </style>
@endsection

@section('content')

    @if ($zonePosition != 0)
        <style>
            .escenas{
                border-right: 2px solid #6e00ff;
                border-left: 2px solid #6e00ff;
                border-radius: 16px 16px 0 0;
                color: #8500FF;
            }

            .preguntas, .llaves, .pistas{
                border-left: unset;
                border-right: 2px solid #6e00ff;
                border-radius: 0 16px 0 0;
                color: black;
            }
            .opciones{
                border-right: unset;
                border-left: 2px solid #6e00ff;
                border-radius: 16px 0 0 0;
                color: black;
            }
            
        </style>
    @endif

    <input type="hidden" id="idEscapeRoom" value="{{ $idEscapeRoom }}">
    <div class="col0 sMarginRight">
        <svg class="btnBack" onclick="window.location.href='{{ route('escaperoom.index') }}'" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 405.333 405.333" style="enable-background:new 0 0 405.333 405.333;" xml:space="preserve">
            <polygon points="405.333,96 362.667,96 362.667,181.333 81.707,181.333 158.187,104.853 128,74.667 0,202.667 128,330.667 
                158.187,300.48 81.707,224 405.333,224"/>        
        </svg>
    </div>

    <div id="title" class="col90 mMarginBottom">
        <span>{{ $escapeRoomName }}</span>
    </div>

    {{-- <nav id="menuHorizontal" class="col100"> --}}
        <div id="menuEscapeRoom" class="col100 mMarginBototom">
            <ul>
                <div id="menuList">
                    <li class="opciones pointer">Opciones</li>
                    <li id="escenasMenu" class="escenas pointer">Escenas</li>
                    <li class="preguntas pointer">Preguntas</li>
                    <li id="liBorder" class="llaves pointer">Llaves</li>
                    <li class="pistas pointer">Pistas</li>
                </div>
            </ul>
        </div>
        <div id="borderDiv" class="col100"></div>
    {{-- </nav> --}}
    {{---------DIV DE ESCENAS--------}}
    @if ($zonePosition != 0)
        <div id="escenas" style="display: block;">
    @else
        <div id="escenas" style="display: none;">
    @endif
        {{------------ MAPA -------------}}
        <div id="map1" class="col60 oneMap">
            @include('backend.zone.map.zonemap')
        </div>
        {{------------ MENÚ ------------}}
        <div id="menu" class="col30 lMarginTop hidden">
            <span id="sceneName"></span>
            <div id="pano" class="col100 relative" style="height: 255px"></div>
            <input type="hidden" id="actualScene">
            <button id="editScene" class="col100 bBlack lMarginTop">Modificar Escena</button>
        </div>
    </div>
    {{---------DIV DE PPREGUNTAS/RESPUESTAS--------}}
    <div id="preguntasRespuestas" style="display: none;">
        <!-- TITULO -->
        <div id="title" class="col80 xlMarginBottom">
            <span>Preguntas</span>
        </div>

        <!-- BOTON AGREGAR -->   
        <div class="col20 xlMarginBottom">   
            <button class="right round col45" id="btn-add">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 25.021 25.021" >
                    <polygon points="25.021,16.159 16.34,16.159 16.34,25.021 8.787,25.021 8.787,16.159 0,16.159 0,8.605 
                            8.787,8.605 8.787,0 16.34,0 16.34,8.605 25.021,8.605" fill="#fff"/>
                </svg>
            </button>
        </div>


        <!-- TABLA DE CONTENIDO -->
        <div id="content" class="col100 centerH">
            <div class="col100">
                <div class="col100 mPaddingLeft mPaddingRight mPaddingBottom">
                    <div class="col30 sPadding xlMarginRight"><strong>Pregunta</strong></div>
                    <div class="col25 sPadding"><strong>Respuesta</strong></div>
                    <div class="col30 sPadding"><strong>Multimedia</strong></div>
                </div>

                <div id="tableContent">
                    @foreach ($question as $value)
                    {{-- Modificar este div y su contenido afectara a la insercion dinamica mediante ajax --}}
                        <div id="{{$value->id}}" class="col100 mPaddingLeft mPaddingRight sPaddingTop">
                            <div class="col30 sPadding xlMarginRight text">{{$value->text}}</div>
                            <div class="col25 sPadding answer">{{$value->answer}}</div>
                            <div class="col15 sPadding mMarginRight">
                                <button id="{{ $value->id }}" class="col100 bBlack multimediaButton">Ver Multimedia</button>
                            </div>
                            <div class="col10 sPadding"><button class="btn-update col100">Editar</button></div>
                            <div class="col10 sPadding"><button class="btn-delete delete col100">Eliminar</button></div>
                        </div>
                    {{----------------------------------------------------------------------------------------}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{---------DIV DE LLAVES--------}}
    <div id="keys" style="display: none;">
        <!-- TITULO -->
     <div id="title" class="col80 xlMarginBottom">
         <span>Llaves</span>
     </div>
          <!-- BOTON AGREGAR -->   
          <div class="col20 xlMarginBottom">   
            <button class="right round col45" id="addKey">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 25.021 25.021" >
                    <polygon points="25.021,16.159 16.34,16.159 16.34,25.021 8.787,25.021 8.787,16.159 0,16.159 0,8.605 
                            8.787,8.605 8.787,0 16.34,0 16.34,8.605 25.021,8.605" fill="#fff"/>
                </svg>
            </button>
        </div>
     <div class="col100">
         <div class="col100 mPaddingLeft mPaddingRight mPaddingBottom">
             <div class="col25 sPadding"><strong>Nombre</strong></div>
             <div class="col35 sPadding lMarginRight"><strong>Pregunta</strong></div>
             <div class="col10 sPadding"><strong>¿Llave final?</strong></div>
         </div>

         <div id="KeyContent">
             @foreach ($keys as $value)
             {{-- Modificar este div y su contenido afectara a la insercion dinamica mediante ajax --}}
                 <div id="{{$value->id}}" class="col100 mPaddingLeft mPaddingRight sPaddingTop">
                     <div class="col25 sPadding">{{$value->name}}</div>
                     @foreach($question as $au)
                         @if($au->id == $value->id_question)
                             <div class="col35 sPadding lMarginRight">{{$au->text}}</div>
                         @endif
                     @endforeach
                     @if($value->finish=='0')
                        <div class="col10 sPadding mMarginRight">No</div>
                    @else
                        <div class="col10 sPadding mMarginRight">Si</div>
                    @endif
                     <div class="col10 sPadding"><button class="btn-updatek col100">Editar</button></div>
                     <div class="col10 sPadding"><button class="btn-deletek delete col100">Eliminar</button></div>
                 </div>
            @endforeach
         </div>
     </div>
 </div>

  {{---------DIV DE PISTAS--------}}
    <div id="pistas" style="display: none;">

        <!-- TITULO -->
        <div id="title" class="col80 xlMarginBottom">
            <span>Pistas</span>
        </div>

        <!-- BOTON AGREGAR -->   
        <div class="col20 xlMarginBottom">   
            <button class="right round col45" id="btn-addPista">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 25.021 25.021" >
                    <polygon points="25.021,16.159 16.34,16.159 16.34,25.021 8.787,25.021 8.787,16.159 0,16.159 0,8.605 
                            8.787,8.605 8.787,0 16.34,0 16.34,8.605 25.021,8.605" fill="#fff"/>
                </svg>
            </button>
        </div>

        <div class="col100">
            <div class="col100 mPaddingLeft mPaddingRight mPaddingBottom">
                <div class="col30 sPadding lMarginRight"><strong>Pista</strong></div>
                <div class="col25 sPadding"><strong>Pregunta</strong></div>
                <div class="col30 sPadding"><strong>Multimedia</strong></div>
            </div>

            <div id="pistaContent">
                @foreach ($clue as $value)
                    {{-- Modificar este div y su contenido afectara a la insercion dinamica mediante ajax --}}
                        <div id="{{$value->id}}" class="col100 mPaddingLeft mPaddingRight sPaddingTop">
                            <div class="col30 sPadding lMarginRight expand">
                                <p>{!!$value->text!!}</p>
                            </div>
                            <div class="col25 sPadding expand">
                                @foreach($question as $value2)
                                    @if($value2->id == $value->id_question)
                                        <p>{{$value2->text}}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col15 sPadding"><button class="col100 bBlack multimediaButtonClue">Ver Multimedia</button></div>
                            <div class="col10 sPadding"><button class="btn-update-pista col100">Editar</button></div>
                            <div class="col10 sPadding"><button class="btn-delete-pista delete col100">Eliminar</button></div>
                        </div>
                    {{----------------------------------------------------------------------------------------}}
                @endforeach
            </div>
        </div>
</div>

{{-- DIV DE OPCIONES --}}
@if ($zonePosition != 0)
<div id="opciones" style="display: none;">    
@else
<div id="opciones" style="display: block;">
@endif
    <!-- TITULO -->
<div id="title" class="col80 xlMarginBottom">
    <span>Opciones</span>
</div>

<!-- BOTON PARA EDITAR -->   
<div class="col20 xlMarginBottom">   
    <button class="right round col45" id="btn-editOptions">
        <?xml version="1.0" encoding="iso-8859-1"?>
    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
    <g>
        <g>
            <g>
                <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893 			"/>
                <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04
                    C386.027,77.92,386.027,64.373,377.707,56.053z"/>
            </g>
        </g>
    </g>
    </svg>
    </button>
</div>

<!--TABLA DE CONTENIDOS -->
    <!--Titulos:-->
    <div class="col100">
        <div class="col25 sPadding"><strong>Audio Ambiental</strong></div>
        <div class="col25 sPadding"><strong>Escena Inicial</strong></div>
        <div class="col25 sPadding"><strong>Historia</strong></div>
        <div class="col25 sPadding"><strong>Audio Historia</strong></div>
    </div>
    <!--Contenidos:-->
    <div id="contenido" class="col100">
        <div id="audioAmbiente" class="col25 sPadding">
            @foreach($audio as $value2)
            @if($value2->id == $datosEscape->environment_audio)
                <audio class="col80" src="{{ url('img/resources/'.$value2->route) }}" controls></audio>
            @endif
            @endforeach    
        </div>
        <div id="escenainicial" class="col25 sPadding" style="width: 25%!important; height:50%!important;">
            <div id="pano" class="col100" style="position: absolute; margin-top: 0%; width: 16% !important; height: 25% !important;"></div>
        </div>
        <div id="historia" class="col25 sPadding">{!!$datosEscape->history!!}</div>
        <div id="audioTexto" class="col25 sPadding">
            @foreach($audio as $value2)
            @if($value2->id == $datosEscape->id_audio)
                <audio class="col80" src="{{ url('img/resources/'.$value2->route) }}" controls></audio>
            @endif
            @endforeach   
        </div>
    </div>
</div>

@section('modal')

    <!--EDITAR OPCIONES-->
    <div id="modalOptionUpdate" class="window" style="display:none">
        <div id="slideModalOptionUpdate" class="slideShow">
            <span class="titleModal col100">EDITAR OPCIOPENS</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div class="col100">
                <form id="formAddOP" action="{{ route('escaperoom.saveOption', 'req_id') }}" method="POST" class="col100">
                    @csrf
                    <p class="xlMarginTop">Historia<span class="req">*<span></p>
                    <textarea id="HistoryAdd" class="editor" name="text" class="col100" required></textarea>
                    <input type="hidden" id="idAudioA">
                    <input type="hidden" id="idAudioT">
                    <input type="hidden" id="idSelectedScene" value="">
                </form>
                <!-- Botones de control -->
                <div id="actionbutton" class="col100 lMarginTop" style="clear: both;">
                    <div id="resourceButtonOp" class="col100 centerH sMarginBottom" style="display: none"><button class=" bBlack col70"></button> </div>
                    <div id="escenaOp" class="col100 centerH"><button class="bBlack col70">Editar Escena</button> </div><br/><br/>
                    <div id="audioTOp" class="col100 centerH sMarginBottom"><button id="btn-audioT" class=" bBlack col70">Editar Audio Texto</button> </div>
                    <div id="audioAOp" class="col100 centerH sMarginBottom"><button id="btn-audioA" class=" bBlack col70">Editar Audio Ambiente</button> </div>
                    <div id="aceptOp" class="col100 centerH"><button id="btn-saveOP" class="col70">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM NUEVO QUESTION -->
    <div id="modalQuestionAdd" class="window" style="display:none">
        <div id="slideModalQuestionAdd" class="slideShow">
            <span class="titleModal col100">NUEVA PREGUNTA</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div class="col100">
                <form id="formAdd" action="{{ route('question.store') }}" method="POST" class="col100">
                    @csrf
                    <p class="xlMarginTop">Pregunta<span class="req">*<span></p>
                    <input type="text" id="textAdd" name="text" class="col100" required><br>
                    <p class="xlMarginTop">Respuesta<span class="req">*<span></p>
                    <input type="text" id="answerAdd" name="answer" class="col100" required><br>
                    <p class="xlMarginTop">Añadir...:<span class="req">*<span></p>
                        <div class="col100"><label class="col10">Ninguno</label><input class="sMarginTop" checked type="checkbox" name="recurso" value="0"></div>
                        <div class="col100"><label class="col10">Imagen</label><input class="sMarginTop" type="checkbox" name="recurso" value="1"></div>
                        <div class="col100"><label class="col10">Video</label><input class="sMarginTop" type="checkbox" name="recurso" value="2"></div>
                    <div id="newQuestionAudio" class="col100 xlMarginTop"></div>
                    <input type="hidden" id="idResourceNewQuestion" value="0">
                    <input type="hidden" id="typeNewQuestion" value="0">
                </form>
                <!-- Botones de control -->
                <div id="actionbutton" class="col100 lMarginTop" style="clear: both;">
                    <div id="resourceButton" class="col100 centerH sMarginBottom" style="display: none"><button class=" bBlack col70"></button> </div>
                    <div id="audio" class="col100 centerH sMarginBottom"><button id="btn-audio" class=" bBlack col70">Añadir Audio</button> </div>
                    <div id="acept" class="col100 centerH"><button id="btn-saveNew" class="col70">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM MODIFICAR QUESTION -->
    <div id="modalQuestionUpdate" class="window" style="display:none">
        <div id="slideUpdateQuestion" class="slideShow">
            <span class="titleModal col100">MODIFICAR PREGUNTA</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div id="contentQuestionUpdate" class="col100">
                <form id="formUpdate" action="{{ route('question.update', 'insertIdHere') }}" method="POST" class="col100">
                    @csrf
                    @method("patch")
                    <p class="xlMarginTop">Pregunta<span class="req">*<span></p>
                    <input type="text" id="textUpdate" name="text" class="col100" required><br>
                    <p class="xlMarginTop">Respuesta<span class="req">*<span></p>
                    <input type="text" id="answerUpdate" name="answer" class="col100" required><br>
                    <p class="xlMarginTop">Añadir...:<span class="req">*<span></p>
                        <div class="col100"><label class="col10">Ninguno</label><input class="sMarginTop" type="checkbox" name="recursoUpdate" value="0"></div>
                        <div class="col100"><label class="col10">Imagen</label><input class="sMarginTop" type="checkbox" name="recursoUpdate" value="1"></div>
                        <div class="col100"><label class="col10">Video</label><input class="sMarginTop" type="checkbox" name="recursoUpdate" value="2"></div> 
                    <input type="hidden" id="updateResourceValue" value="0">
                    <input type="hidden" id="idResourceUpdateQuestion" value="0">
                    <input type="hidden" id="typeUpdateQuestion" value="0">
                </form>
                <div id="audioIfExist" class="col100 mMarginBottom mMarginTop"></div>
                <!-- Botones de control -->
                <div id="actionbutton" class="col100 lMarginTop" style="clear: both;">
                    <div id="resourceUpdateButton" class="col100 centerH sMarginBottom" style="display: none"><button class="bBlack col70"></button> </div>
                    <div id="audio" class="col100 centerH sMarginBottom"><button id="btn-update-audio" class="col70 bBlack">Añadir Audio</button> </div>
                    <div id="acept" class="col100 centerH"><button id="btn-update" class="col70">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PARA ACTUALIZAR AUDIO DE PREGUNTA -->
    <div id="modalSelectUpdateAudio" class="window" style="display:none">
        <div id="slideUpdateAudio" class="slide" style="display: none">
            <span class="titleModal col100">SELECCIONAR AUDIO</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div id="contentUpdateAudio" class="col100 mMarginTop mMarginBottom">
                @foreach ($audio as $a)
                    <div class="col100 sMarginBottom">
                        <input type="checkbox" name="updateAudioInput" class="selectAudioForUpdateQuestion col10" value="{{ $a->id }}">
                        <p class="col30">{{ $a->title }}</p>
                        <audio src="img/resources/{{ $a->route }}" controls class="col50"></audio>
                    </div>
                @endforeach
            </div>
            <div class="col100"><button id="aceptUpdateAudio" class="col100">Aceptar</button></div>
        </div>
    </div>
    
    <!-- MODAL DE CONFIRMACIÓN PARA ELIMINAR PREGUNTA -->
    <div class="window" id="confirmDelete" style="display: none;">
        <span class="titleModal col100">¿Eliminar pregunta?</span>
        <button id="closeModalWindowButton" class="closeModal" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
            <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
        </svg>
        </button>
        <div class="confirmDeleteScene col100 xlMarginTop" style="margin-left: 3.8%">
            <button id="aceptDelete" class="delete">Aceptar</button>
            <button id="cancelDelete">Cancelar</button>
        </div>
    </div>

        <!-- MODAL DE CONFIRMACIÓN PARA ELIMINAR KEYS -->
        <div class="window" id="confirmDeleteK" style="display: none;">
            <span class="titleModal col100">¿Eliminar llave?</span>
            <button id="closeModalWindowButton" class="closeModal" >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div class="confirmDeleteScene col100 xlMarginTop" style="margin-left: 3.8%">
                <button id="DeleteKey" class="delete">Aceptar</button>
                <button id="cancelDelete">Cancelar</button>
            </div>
        </div>

        <!-- Modal audiodescripciones -->
        <div id="modalResource" class="window" style="display:none">
            <div id="slideModalResource" class="slide" style="display: none">
                <span class="titleModal col100">Audiodescripción</span>
                <button class="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                    <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
                </svg>
                </button>
                <!-- Contenido modal -->
                <div class="mMarginTop"> 
                    <!-- Contenedor de audiodescripciones -->
                    <div id="audioDescrip" class="xlMarginTop col100">
                    @foreach ($audio as $value)
                        <div id="{{ $value->id }}" class="elementResource col25 tooltip">
                            {{-- Descripcion si la tiene --}}
                            @if($value->description!=null)
                                <span class="tooltiptext">{{$value->description}}</span>
                            @endif
        
                            <div style="cursor: pointer;" class="insideElement">
                                <!-- MINIATURA -->
                                <div class="preview col100">
                                        <img src="{{ url('/img/spectre.png') }}">
                                </div>
                                <div class="titleResource col100">
                                    <div class="nameResource col80">
                                        {{ $value->title }}
                                    </div>
                                    <div class="col20">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.9 18.81">
                                                <path class="cls-1" d="M4.76,12.21a3.42,3.42,0,1,0,1.9,4.45,3.49,3.49,0,0,0,.24-1.27V4.3H17.82v7.92a3.41,3.41,0,1,0,1.9,4.44A3.49,3.49,0,0,0,20,15.39V0H4.76" transform="translate(-0.07 0)"></path>
                                            </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
        
                    <!-- form para guardar la escena -->
                    <form id="addsgv" style="display:none;">
                        @csrf
                        <input id="sgvId" type="text" name="sgv" value="" >
                        <input id="sceneValue" type="text" name="scene" value="" >
                        <input id="resourceValue" type="text" name="resource" value="" >
                    </form>
        
                    <!-- Botones de control -->
                    <div id="actionbutton" style="clear:both;" class="lMarginTop col100">
                        <div id="acept" class="col100"> <button class="btn-acept col100" id="saveAudio">Guardar</button> </div>
                    </div>
                </div>
            </div>
        </div>

        <!--FORM NUEVA KEY--> 
        <div id="modalKeyAdd" class="window" style="display:none">
            <div id="slideModalKeyAdd" class="slideShow">
                <span class="titleModal col100">NUEVA LLAVE</span>
                <button id="closeModalWindowButton" class="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                    <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
                </svg>
                </button>
                <div class="col100">
                    <form id="formAddK" action="{{ route('key.store') }}" method="POST" class="col100">
                        @csrf
                        <p class="xlMarginTop">Nombre<span class="req">*<span></p>
                        <input type="text" id="textAdd" name="name" class="col100" required><br>
                        <input type="hidden" id="QuestionValue" name="question"> 
                        <input type="hidden" id="idSelectedScene" name="scenes_id">
                        <div class="col50">
                            <p class="xlMarginTop">¿Llave final?<span class="req">*<span></p>
                            <input type="radio" id="final" name="key" value="1">
                            <label for="keyTrue">Si</label>
                            <input type="radio" id="finalFalse" name="key" value="0" checked>
                            <label for="keyFalse">No</label>
                        </div>
                    </form>
                    <!-- Botones de control -->
                    <div id="actionbutton" class="col100 lMarginTop" style="clear: both;">
                        <div id="escena" class="col100 centerH"><button id="btn-escena" class="bBlack col70">Seleccionar Escena</button> </div><br/><br/>
                        <div id="pregunta" class="col100 centerH"><button id="btn-pregunta" class="bBlack col70">Añadir Pregunta</button> </div><br/><br/>
                        <div id="acept" class="col100 centerH"><button id="btn-saveKey" class="col70">Guardar</button> </div>
                    </div>
                </div>
            </div>
        </div>

        <!--AÑADIR PREGUNTA--> 
        <div id="modalAddQuestionForKey" class="window" style="display:none">
            <div id="slideModalAddQuestionForKey" class="slide" style="display: none">
                <span class="titleModal col100">Preguntas</span>
                <button class="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                    <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
                </svg>
                </button>
                <!-- Contenido modal -->
                <div class="mMarginTop mMarginBonttom"> 
                    <!-- Contenedor de audiodescripciones -->
                    <div id="audioDescrip" class="xlMarginTop col100">
                    @foreach ($question as $value)
                        <div id="{{ $value->id }}">
                            <div style="cursor: pointer;">
                                <input type="checkbox" id="{{ $value->id }}" class="seleccionado" value="{{ $value->id }}"> <label for="cbox2">{{$value->text}}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <!-- Botones de control -->
                <div id="actionbutton" style="clear:both;" class="lMarginTop col100 centerH">
                    <div id="aceptPregunta" class="col80 centerH"> <button class="btn-acept col100" id="saveAudio">Guardar</button> </div>
                </div>
            </div>
        </div>

        <!-- MODAL MAPA -->
        <script src="{{url('js/zone/zonemap.js')}}"></script>
        <div  id="modalMap" class="window sizeWindow70" style="display: none;">
            <div id="mapSlide" class="slide" style="display:none">
                <span class="titleModal col100">SELECCIONAR ESCENA</span>
                <button class="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                    <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
                </svg>
                </button>
                <div class="content col90 mMarginTop" style="overflow: auto; max-height: 523px">
                    <div id="map2" class="oneMap col100">
                        @include('backend.zone.map.zonemap')
                    </div>
                </div>
            </div>
            <div class="col80 centerH mMarginTop" style="margin-left: 9%">
                <button id="addSceneToKey" class="col100">Aceptar</button>
            </div>
        </div>

    <!--MODAL EDITAR KEY-->
    <div id="modalKeyUpdate" class="window" style="display:none">
        <div id="slideModalKeyUpdate" class="slideShow">
            <span class="titleModal col100">EDITAR LLAVE</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div class="col100">
                <form id="formUpdateK" action="{{ route('key.update', 'req_id') }}" method="POST" class="col100">
                    @csrf
                    <p class="xlMarginTop">Nombre<span class="req">*<span></p>
                    <input type="text" id="textKUpdate" name="name" class="col100" required><br>
                    <input type="hidden" id="QuestionValueUpdate" name="question"> 
                    <input type="hidden" id="idSelectedSceneUpdate" name="scenes_id">
                    <div class="col50">
                        <p class="xlMarginTop">¿Llave final?<span class="req">*<span></p>
                        <input type="radio" id="final" name="key" value="1">
                        <label for="keyTrue">Si</label>
                        <input type="radio" id="finalFalse" name="key" value="0" checked>
                        <label for="keyFalse">No</label>
                    </div>
                </form>
                <!-- Botones de control -->
                <div id="actionbutton" class="col100 lMarginTop" style="clear: both;">
                    <div id="escena" class="col100 centerH"><button id="btn-escenaUpdate" class="bBlack col70">Cambiar Escena</button> </div><br/><br/>
                    <div id="pregunta" class="col100 centerH"><button id="btn-preguntaUpdate" class="bBlack col70">Cambiar Pregunta</button> </div><br/><br/>
                    <div id="acept" class="col100 centerH"><button id="btn-updatek" class="col70">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    {{-------------------------- MODALES DE PISTAS ----------------------------------}}

    <!-- FORM NUEVA PISTA -->
    <div id="modalPistaAdd" class="window" style="display:none; max-height: 90%">
        <div id="slideModalPistaAdd" class="slideShow">
            <span class="titleModal col100">NUEVA PISTA</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div class="col100">
                <form id="formAddPista" action="{{ route('clue.store') }}" method="POST" class="col100">
                    @csrf
                    <p class="xlMarginTop">Texto<span class="req">*<span></p>
                    {{-- <input type="textarea" id="text" name="text" class="col100" required><br> --}}
                    <textarea id="textoPista" class="editor" name="text"></textarea>
                    <p class="xlMarginTop">¿Se muestra?<span class="req">*<span></p>
                    <input type="radio" id="showTrue" name="show" value="1">
                    <label for="showTrue">Si</label>
                    <input type="radio" id="showFalse" name="show" value="0" checked>
                    <label for="showFalse">No</label>

                    <p>Seleciona la pregunta</p>
                    <select name="question">
                        <option value="null">Pregunta sin seleccionar</option>
                        @foreach ($question as $value)
                        <option value="{{ $value->id }}"> {{ $value->text }} </option>    
                        @endforeach
                    </select>

                    
                    
                    <p class="xlMarginTop">Añadir...:<span class="req">*<span></p>
                        <div class="col100"><label class="col10">Ninguno</label><input class="sMarginTop" checked type="checkbox" name="resourceAddPista" value="0"></div>
                        <div class="col100"><label class="col10">Imagen</label><input class="sMarginTop" type="checkbox" name="resourceAddPista" value="1"></div>
                        <div class="col100"><label class="col10">Video</label><input class="sMarginTop" type="checkbox" name="resourceAddPista" value="2"></div>
                    
                </form>

                <!-- Botones de control -->
                <div id="actionbutton" class="col100 lMarginTop xlMarginBottom" style="clear: both;">
                    <div id="resourceButton" class="col100 centerH sMarginBottom" style="display: none"><button class=" bBlack col70"></button> </div>
                    <div id="audio" class="col100 centerH sMarginBottom"><button class="btn-audio-pistas bBlack col70">Añadir Audio</button> </div>
                    <div id="acept" class="col100 centerH sMarginBottom"><button id="btn-save" class="col70">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM MODIFICAR PISTA -->
    <div id="modalPistaUpdate" class="window" style="display:none; max-height: 90%;" >
        <div id="slideModalPistaUpdate" class="slideShow">
            <span class="titleModal col100">MODIFICAR PISTA</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <div class="col100">
                <form id="formUpdatePista" action="{{ route('clue.update', 'req_id') }}" method="POST" class="col100">
                    @csrf
                    <p class="xlMarginTop">Texto<span class="req">*<span></p>
                    <textarea class="editor" id="textareaedit" name="text"></textarea>
                    <p class="xlMarginTop">¿Se muestra?<span class="req">*<span></p>
                    <input type="radio" id="showTrue" name="show" value="1">
                    <label for="showTrue">Si</label>
                    <input type="radio" id="showFalse" name="show" value="0" checked>
                    <label for="showFalse">No</label>

                    <p>Seleciona la pregunta</p>
                    <select name="question">
                        <option value="null">Pregunta sin seleccionar</option>
                        @foreach ($question as $value)
                        <option value="{{ $value->id }}"> {{ $value->text }} </option>    
                        @endforeach
                    </select>

                    <p class="xlMarginTop">Añadir...:<span class="req">*<span></p>
                        <div class="col100"><label class="col10">Ninguno</label><input class="sMarginTop" checked type="checkbox" name="resourceUpdatePista" value="0"></div>
                        <div class="col100"><label class="col10">Imagen</label><input class="sMarginTop" type="checkbox" name="resourceUpdatePista" value="1"></div>
                        <div class="col100"><label class="col10">Video</label><input class="sMarginTop" type="checkbox" name="resourceUpdatePista" value="2"></div>
                    
                    
                </form>

                <!-- Botones de control -->
                <div id="actionbutton" class="col100 lMarginTop xlMarginBottom" style="clear: both;">
                    <div id="resourceButton" class="col100 centerH sMarginBottom" style="display: none"><button class=" bBlack col70"></button> </div>
                    <div id="audio" class="col100 centerH sMarginBottom"><button class="btn-audio-pistas bBlack col70">Añadir Audio</button> </div>
                    <div id="acept" class="col100 centerH"><button id="btn-update" class="col70">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal audiodescripciones -->
    <div id="modalAudioPistas" class="window" style="display:none">
        <div id="slideModalAudioPistas" class="slide" style="display: none">
            <span class="titleModal col100">Audiodescripción</span>
            <button class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <!-- Contenido modal -->
            <div class="mMarginTop"> 
                <!-- Contenedor de audiodescripciones -->
                <div id="audioDescrip" class="xlMarginTop col100">
                @foreach ($audio as $value)
                    <div id="{{ $value->id }}" class="elementResource col25 tooltip">
                        {{-- Descripcion si la tiene --}}
                        @if($value->description!=null)
                            <span class="tooltiptext">{{$value->description}}</span>
                        @endif

                        <div style="cursor: pointer;" class="insideElement">
                            <!-- MINIATURA -->
                            <div class="preview col100">
                                    <img src="{{ url('/img/spectre.png') }}">
                            </div>
                            <div class="titleResource col100">
                                <div class="nameResource col80">
                                    {{ $value->title }}
                                </div>
                                <div class="col20">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.9 18.81">
                                            <path class="cls-1" d="M4.76,12.21a3.42,3.42,0,1,0,1.9,4.45,3.49,3.49,0,0,0,.24-1.27V4.3H17.82v7.92a3.41,3.41,0,1,0,1.9,4.44A3.49,3.49,0,0,0,20,15.39V0H4.76" transform="translate(-0.07 0)"></path>
                                        </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

                <input type="text" id="audio" name="audio" hidden>

                <!-- Botones de control -->
                <div id="actionbutton" style="clear:both;" class="lMarginTop col100">
                    <div id="acept" class="col20"> <button id="btn-acept-audio-pistas" class="col100">Guardar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE SELECCIÓN DE IMÁGENES -->
    <div id="modalAddImage" class="window" style="display:none; max-height: 80%">
        <div id="slideModalAddImage" class="slide">
            <span class="titleModal col100">AÑADIR IMAGEN</span>
            <button id="closeModalWindowButton" class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            {{-- BUSCADOR --}}
            <div class="searchBoxResource sMarginTop">
                <input type="text" name="searchResource" class="searchTxtResource" placeholder="Buscar..."/>
                <div class="searchResource">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                        <path d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667    S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732    c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667    c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z"/>
                    </svg>
                </div>
            </div>
            <div id="modalAddImageContent" class="col100 xlMarginTop container">
                @foreach ($images as $image)
                    <div id="{{ $image->id }}" class="oneImage elementResource col20 mMarginRight mMarginBottom row20" >
                        <img class="col100" src="{{ url('img/resources/miniatures/'.$image->route) }}" alt="" style="border-radius: 16px">
                    </div>
                @endforeach
            </div>
            <!-- Botones de control -->
            <div id="actionbutton" class="col100 lMarginTop" style="clear: both;">
                <div class="col100 centerH sMarginBottom"><button id="aceptAddImage" class="col70">Aceptar</button> </div>
                <div class="col100 centerH"><button id="deleteImage" class="col70 delete">Eliminar</button> </div>
            </div>
        </div>
    </div>

    <style>
        #modalAddImageContent{
            overflow: auto;
            height: 395px;
            margin-left: 6.3%;
        }

        #modalResource{
            max-height: 80%;
        }

        #audioDescrip {
            height: 400px;
        }
    </style>

    <!-- MODAL DE CONFIRMACIÓN PARA ELIMINAR PISTAS -->
    <div class="window" id="confirmDeletePista" style="display: none;">
        <span class="titleModal col100">¿Eliminar pista?</span>
        <button id="closeModalWindowButton" class="closeModal" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
               <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
           </svg>
        </button>
        <div class="col100 xlMarginTop" style="margin-left: 3.8%">
            <button id="aceptDelete" class="delete">Aceptar</button>
            <button id="cancelDelete">Cancelar</button>
        </div>
    </div>


    <!-- Modal videos -->
    <div id="modalVideo" class="window" style="display:none">
        <div id="slideModalVideo" class="slide" style="display: none">
            <span class="titleModal col100">Videos</span>
            <button class="closeModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
                <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
            </svg>
            </button>
            <!-- Contenido modal -->
            <div class="mMarginTop"> 
                {{-- BUSCADOR --}}
                <div class="searchBoxResource">
                    <input type="text" name="searchResource" class="searchTxtResource" placeholder="Buscar..."/>
                    <div class="searchResource">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                            <path d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667    S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732    c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667    c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z"/>
                        </svg>
                    </div>
                </div>
                <!-- Contenedor de videos -->
                
                <div id="containerVideos" class="xlMarginTop col100 container">
                @foreach ($video as $value)
                    <div id="{{ $value->id }}" class="oneVideo elementResource col25 tooltip">
                        {{-- Descripcion si la tiene --}}
                        @if($value->description!=null)
                            <span class="tooltiptext">{{$value->description}}</span>
                        @endif

                        <div style="cursor: pointer;" class="insideElement">
                            <!-- MINIATURA -->
                            <div class="preview col100">
                                    <img src="{{ $value->preview }}">
                            </div>
                            <div class="titleResource col100">
                                <div class="nameResource col80">
                                    {{ $value->title }}
                                </div>
                                <div class="col20">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.9 18.81">
                                            <path class="cls-1" d="M4.76,12.21a3.42,3.42,0,1,0,1.9,4.45,3.49,3.49,0,0,0,.24-1.27V4.3H17.82v7.92a3.41,3.41,0,1,0,1.9,4.44A3.49,3.49,0,0,0,20,15.39V0H4.76" transform="translate(-0.07 0)"></path>
                                        </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

                <!-- Botones de control -->
                <div id="actionbutton" style="clear:both;" class="lMarginTop col100">
                    <div id="acept" class="col100 centerH sMarginBottom"> <button id="btn-acept-video" class="col70">Guardar</button> </div>
                    <div class="col100 centerH"><button id="btn-delete-video" class="col70 delete">Eliminar</button> </div>
                </div>
            </div>
        </div>
    </div>

    <!------------ MODAL DE MULTIMEDIA DE LAS PREGUNTAS ------------->
    <div class="window" id="modalMultimedia" style="display: none; max-height: 90%;">
        <span class="titleModal col100">MULTIMEDIA</span>
        <button id="closeModalWindowButton" class="closeModal" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
               <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
           </svg>
        </button>
        <div class="col100 xlMarginTop" style="margin-left: 3.8%">
            <div class="col100 resourceMultimedia lMarginBottom"></div>
            <div class="col100 audioMultimedia lMarginBottom"></div>
        </div>
    </div>

@endsection


    <script>
        /* RUTAS PARA ARCHIVOS EXTERNOS JS */
        var pointImgRoute = "{{ url('img/zones/icon-zone.png') }}";
        var pointImgHoverRoute = "{{ url('img/zones/icon-zone-hover.png') }}";
        var marzipanoTiles = "{{url('/marzipano/tiles/dn/{z}/{f}/{y}/{x}.jpg')}}";
        var marzipanoPreview = "{{url('/marzipano/tiles/dn/preview.jpg')}}";
        var getResource = "{{ route('resource.getResource', 'req_id') }}";
        var resourcesRoute = "{{ url('img/resources/audio') }}";
        var getQuestionMultimedia = "{{ route('question.getMultimedia', 'req_id') }}";
        var getZoneFromScene = "{{ route('scene.getZone', 'req_id') }}";

        function sceneInfo($id){
            var route = "{{ route('scene.show', 'id') }}".replace('id', $id);
            return $.ajax({
                url: route,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                }
            });
        }

        function loadScenePreview(sceneDestination, element){
            'use strict';
            //1. VISOR DE IMAGENES
            var panoElement = element;

            /* Progresive controla que los niveles de resolución se cargan en orden, de menor 
            a mayor, para conseguir una carga mas fluida. */
            var viewer =  new Marzipano.Viewer(panoElement, {stage: {progressive: true}}); 

            //2. RECURSO
            var source = Marzipano.ImageUrlSource.fromString(
                marzipanoTiles.replace('dn', sceneDestination.directory_name),
            //Establecer imagen de previsualizacion para optimizar su carga 
            //(bdflru para establecer el orden de la capas de la imagen de preview)--------------
            {cubeMapPreviewUrl: marzipanoPreview.replace('dn', sceneDestination.directory_name), 
            cubeMapPreviewFaceOrder: 'lfrbud'});

            //3. GEOMETRIA 
            var geometry = new Marzipano.CubeGeometry([
            { tileSize: 256, size: 256, fallbackOnly: true  },
            { tileSize: 512, size: 512 },
            { tileSize: 512, size: 1024 },
            { tileSize: 512, size: 2048},
            ]);

            //4. VISTA
            //Limitadores de zoom min y max para vista vertical y horizontal
            var limiter = Marzipano.util.compose(
                Marzipano.RectilinearView.limit.vfov(0.698131111111111, 2.09439333333333),
                Marzipano.RectilinearView.limit.hfov(0.698131111111111, 2.09439333333333)
            );
            //Establecer estado inicial de la vista con el primer parametro
            var view = new Marzipano.RectilinearView({yaw: sceneDestination.yaw, pitch: sceneDestination.pitch, roll: 0, fov: Math.PI}, limiter);

            //5. ESCENA SOBRE EL VISOR
            var scene = viewer.createScene({
            source: source,
            geometry: geometry,
            view: view,
            pinFirstLevel: true
            });

            //6.MOSTAR
            scene.switchTo({ transitionDuration: 1000 });
        }

        $().ready(function(){

            //CODIGO DEL MENÚ ESCENAS DE ESCAPE ROOM NO TOCAR
            $('#map1 .scenepoint').click(function(){
                $('#menu').show();
                $('#map1 .scenepoint').attr('src', pointImgRoute);
                $('#map1 .scenepoint').removeClass('selected');
                $(this).attr('src', pointImgHoverRoute);
                $(this).addClass('selected');
                var pointId = $(this).attr('id');
                var sceneId = parseInt(pointId.substr(5));
                $('#actualScene').val(sceneId);
                sceneInfo(sceneId).done(function(result){
                    $('#sceneName').text(result.name);
                    var elemento = document.getElementById('pano');
                    loadScenePreview(result, elemento);
                })
            });

            $('#editScene').click(function(){
                var pointId = $(this).attr('id');
                var sceneId = $('#actualScene').val();
                var escapeRoomId = $('#idEscapeRoom').val();
                var casiRuta = "{{ route('escaperoom.editScene', ['id' => 'sceneId', 'id2' => 'escapeRoomId']) }}".replace('sceneId', sceneId);
                var ruta = casiRuta.replace('escapeRoomId', escapeRoomId);
                window.location.href = ruta;
            });

        });

        /*Funciones para cambiar entre menús:*/
        $(".escenas").click(function(){
            $("#escenas").css("display", "block");
            $("#preguntasRespuestas").css("display", "none");
            $("#keys").css("display", "none");
            $("#pistas").css("display", "none");
            $("#opciones").css("display", "none");
            $('.escenas').css({
                'border-right': '2px solid #6e00ff',
                'border-left': '2px solid #6e00ff',
                'border-radius': '16px 16px 0 0',
                'color': '#8500ff',
            });
            $('.preguntas').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.llaves').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.opciones').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.pistas').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
        });

        $(".preguntas").click(function(){
            $("#preguntasRespuestas").css("display", "block");
            $("#escenas").css("display", "none");
            $("#keys").css("display", "none");
            $("#pistas").css("display", "none");
            $("#opciones").css("display", "none");
            $('.escenas').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.llaves').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.preguntas').css({
                'border-left': '2px solid #6e00ff',
                'border-right': '2px solid #6e00ff',
                'border-radius': '16px 16px 0 0',
                'color': '#8500ff',
            });
            $('.pistas').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.opciones').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
        });

        $(".llaves").click(function(){
            $("#keys").css("display", "block");
            $("#escenas").css("display", "none");
            $("#preguntasRespuestas").css("display", "none");
            $("#pistas").css("display", "none");
            $("#opciones").css("display", "none");
            $('.escenas').css({
                'border-right': 'unset',
                'border-left': '2px solid #6e00ff',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.preguntas').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.llaves').css({
                'border-left': '2px solid #6e00ff',
                'border-right': '2px solid #6e00ff',
                'border-radius': '16px 16px 0 0',
                'color': '#8500ff',
            });
            $('.pistas').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.opciones').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
        });

        $(".pistas").click(function(){
            $("#escenas").css("display", "none");
            $("#preguntasRespuestas").css("display", "none");
            $("#keys").css("display", "none");
            $("#opciones").css("display", "none");
            $("#pistas").css("display", "block");
            $('.escenas').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.preguntas').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.llaves').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.opciones').css({
                'border-left': '2px solid #6e00ff',
                'border-right': 'unset',
                'border-radius': '16px 0 0 0',
                'color': 'black',
            });
            $('.pistas').css({
                'border-left': '2px solid #6e00ff',
                'border-radius': '16px 16px 0 0',
                'color': '#8500ff',
            });
        });

        $(".opciones").click(function(){
            $("#escenas").css("display", "none");
            $("#preguntasRespuestas").css("display", "none");
            $("#keys").css("display", "none");
            $("#pistas").css("display", "none");
            $("#opciones").css("display", "block");
            $('.opciones').css({
                'border-left': '2px solid #6e00ff',
                'border-right': '2px solid #6e00ff',
                'border-radius': '16px 16px 0 0',
                'color': '#8500ff',
            });
            $('.escenas').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.preguntas').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.llaves').css({
                'border-left': 'unset',
                'border-right': '2px solid #6e00ff',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
            $('.pistas').css({
                'border-left': 'unset',
                'border-radius': '0 16px 0 0',
                'color': 'black',
            });
        });

        ruta = "{{route('resource.getroute', 'req_id')}}";
        rutaK =  "{{route('question.getroute', 'req_id')}}";
        keyDelete = "{{route('key.destroy', 'req_id')}}";
        keyEdit =  "{{route('key.edit', 'req_id')}}";
        keyUpdate =  "{{route('key.update', 'req_id')}}";
        clueShow = "{{ route('clue.show', 'req_id') }}";
        clueDelete = "{{ route('clue.destroy', 'req_id') }}";
        getMultimediaClue = "{{ route('clue.getMultimedia', 'req_id') }}";
        OptionEdit = "{{route('escaperoom.getOne', 'req_id')}}";
        searchResourceUrl = "{{ route('resource.searchResources') }}";
        var urlAudio = "{{url('img/resources/')}}";
        var token = "{{ csrf_token() }}";
        var pistaeditada = "{!! 'req_text' !!}";

        $(document).ready(function(){
            var id = {{$datosEscape->start_scene}};
            sceneInfo(id).done(function(result){
                var elemento = document.getElementById("escenainicial").childNodes[1];
                console.log(elemento);
                loadScenePreview(result, elemento);
            });
        });
    </script>
@endsection