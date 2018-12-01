<div class="der_content_1">

        <div class="space_tags">
                <h4 class="tittt_dr">Tags</h4>
                <div class="box_tags">
                    @foreach($tag_mas as $gsd)
                    <a class="tag" href="{{$gsd->url}}">{{$gsd->nombre}}</a>
                    @endforeach
                </div>
            </div>


        <div class="space_comentarios_destacados">
            <h4 class="tittt_dr">Comentarios</h4>
            <div class="bx_contrlll_comentts">
                <div class="list-comentss">
                    @foreach($comentarios as $come)
                        @if($come->noticia!=null)
                            <a class="comentario_last" href="{{$come->noticia->url}}">
                                <div class="box-icon_commmt">{{substr($come->nombre, 0,1)}} </div>
                                <div class="space_commmt">
                                    <div class="top_commmnt">{{$come->nombre}}</div>
                                    <div class="comennttt1">
                                        <p>{{substr($come->comentario, 0,200)}}{{strlen($come->comentario)>100 ? '..
                                        .': ''}}</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if($come->producto!=null)
                            <a class="comentario_last" href="{{$come->producto->url}}">
                                <div class="box-icon_commmt">{{substr($come->nombre, 0,1)}} </div>
                                <div class="space_commmt">
                                    <div class="top_commmnt">{{$come->nombre}}</div>
                                    <div class="comennttt1">
                                        <p>{{substr($come->comentario, 0,200)}}{{strlen($come->comentario)>100 ? '..
                                        .': ''}}</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <br>

</div>