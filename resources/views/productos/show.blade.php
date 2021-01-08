@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="card p-3">

                <div class="card__body">
                    <div class="half">
                        <div class="featured_text">
                            <h1>{{ $producto->nombre }}</h1><br>
                            {{-- <p class="sub">Office Chair</p> --}}
                           
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="image">
                                    <img src="/{{ $producto->imagen }}" alt="producto" width="78%"
                                        style="display: block;margin: 0 auto;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row" style="justify-content: center; text-align: center;">
                                    <div class="col-md-3 mr-5" >
                                        <h4><strong>Importadora</strong></h4>
                                        <h5> {{ $producto->importadora }}</h5>  
                                    </div>
                                    <div class="col-md-3 mr-5" >
                                        <h4><strong>Medidas</strong></h4>
                                        <h5> {{ $producto->medida }}</h5>  
                                    </div>
                                    <div class="col-md-3 mr-5" >
                                        <h4><strong>Tipo de Medida</strong></h4>
                                        <h5> {{ $producto->tipo_medida }}</h5>  
                                    </div>
                                </div><br>
                                <div class="row" style="justify-content: center; text-align: center;">
                                    <div class="col-md-3 mr-5" >
                                        <h4><strong>Categoria</strong></h4>
                                        <h5> {{ $producto->categorias_id  }}</h5>  
                                    </div>
                                    <div class="col-md-3 mr-5" >
                                        <h4><strong>Sub-Categoria</strong></h4>
                                        <h5> {{ $producto->subcategorias_id }}</h5>  
                                    </div>
                                    {{-- <div class="col-md-3 mr-5" >
                                        <h4><strong>Tipo de Medida</strong></h4>
                                        <h3> {{ $producto->tipo_medida }}</h3>  
                                    </div> --}}
                                </div>
                                <div class="half">
                                    <div class="description">
                                        <h3><strong>Descripción</strong></h3>
                                        <p>{{ $producto->descripcion }}</p>
                                    </div>
                                    @if( $producto->estado == 'disponible' )
                                    <span class="stock"><i class="fa fa-check"></i> Disponible</span>
                                    @endif
                                    @if( $producto->estado == 'no-disponible')
                                    <span class="stock"><i class="fa fa-times-circle" aria-hidden="true"></i> No
                                        Disponible</span>
                                    @endif
                                    @if( $producto->estado == 'Pendiente')
                                    <span class="stock"><i class="fa fa-minus" aria-hidden="true"></i> Pendiente</span>
                                    @endif
                                    <div class="reviews">
                                        <div class="col-sm ">
                                            {{-- <label>Calificacion del Producto</label> --}}
                                            <p class="clasificacion">
                                                <input id="radio11" type="radio" name="puntuacion" value="5">
                                                <label for="radio11" class="label1">★</label>
                                                <input id="radio22" type="radio" name="puntuacion" value="4">
                                                <label for="radio22" class="label1">★</label>
                                                <input id="radio33" type="radio" name="puntuacion" value="3">
                                                <label for="radio33" class="label1">★</label>
                                                <input id="radio44" type="radio" name="puntuacion" value="2">
                                                <label for="radio44" class="label1">★</label>
                                                <input id="radio55" type="radio" name="puntuacion" value="1">
                                                <label for="radio55" class="label1">★</label>

                                            </p>
                                        </div>
                                        <h4><strong>Precio:</strong></h4><h4> {{ $producto->precio }} Bs.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card__footer">
                    <div class="recommend">
                        <p>Recommended by</p>
                        <h3>Andrew Palmer</h3>
                    </div>
                    <div class="action">
                        <button type="button">Add to cart</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</div>
<style>
    .mtform {
        width: 100%;
    }
    table {
        width: 100%;
    }
    h3 {
        margin-block-end: 0em !important;
    }
    .mat-sort-header {
        text-align: center;
    }
    td {
        text-align: center;
    }
    .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
    }
    label:hover,
    label:hover~label {
        color: orange;
    }
    input[type="radio"]:checked~label {
        color: orange;
    }
    input[type="radio"] {
        display: none;
    }
    .label1 {
        padding-right: 3px;
        color: grey;
        font-size: 35px;
        /* margin-bottom: 3.0rem !important; */
    }

    p,
    h4 {

            main {
                max-width: 720px;
                margin: 5% auto;
            }
            .card {
                box-shadow: 0 6px 6px rgba(#000, 0.3);
                transition: 200ms;
                background: #fff;

                .card__title {
                    display: flex;
                    align-items: center;
                    padding: 30px 40px;

                    h3 {
                        flex: 0 1 200px;
                        text-align: right;
                        margin: 0;
                        color: #252525;
                        font-family: sans-serif;
                        font-weight: 600;
                        font-size: 20px;
                        text-transform: uppercase;
                    }

                    .icon {
                        flex: 1 0 10px;
                        background: #115dd8;
                        color: #fff;
                        padding: 10px 10px;
                        transition: 200ms;

                        >a {
                            color: #fff;
                        }

                        &:hover {
                            background: #252525;
                        }
                    }
                }

                .card__body {
                    padding: 0 40px;
                    display: flex;
                    flex-flow: row no-wrap;
                    margin-bottom: 25px;

                    >.half {
                        box-sizing: border-box;
                        padding: 0 15px;
                        flex: 1 0 50%;
                    }

                    .featured_text {
                        h1 {
                            margin: 0;
                            padding: 0;
                            font-weight: 800;
                            font-family: "Montserrat", sans-serif;
                            font-size: 64px;
                            line-height: 50px;
                            color: #181e28;
                        }

                        p {
                            margin: 0;
                            padding: 0;

                            &.sub {
                                font-family: "Montserrat", sans-serif;
                                font-size: 26px;
                                text-transform: uppercase;
                                color: #686e77;
                                font-weight: 300;
                                margin-bottom: 5px;
                            }

                            &.price {
                                font-family: "Fjalla One", sans-serif;
                                color: #252525;
                                font-size: 26px;
                            }
                        }
                    }

                    .image {
                        padding-top: 15px;
                        width: 5%;

                        img {
                            display: block;
                            max-width: 0%;
                            height: auto;
                        }
                    }

                    .description {
                        margin-bottom: 25px;

                        p {
                            margin: 0;
                            font-family: "Open Sans", sans-serif;
                            font-weight: 300;
                            line-height: 27px;
                            font-size: 16px;
                            color: #555;
                        }
                    }

                    span.stock {
                        font-family: "Montserrat", sans-serif;
                        font-weight: 600;
                        color: #a1cc16;
                    }

                    .reviews {
                        .stars {
                            display: inline-block;
                            list-style: none;
                            padding: 0;

                            >li {
                                display: inline-block;

                                .fa {
                                    color: #f7c01b;
                                }
                            }
                        }

                        >span {
                            font-family: "Open Sans", sans-serif;
                            font-size: 14px;
                            margin-left: 5px;
                            color: #555;
                        }
                    }
                }

                .card__footer {
                    padding: 30px 40px;
                    display: flex;
                    flex-flow: row no-wrap;
                    align-items: center;
                    position: relative;

                    &::before {
                        content: "";
                        position: absolute;
                        display: block;
                        top: 0;
                        left: 40px;
                        width: calc(100% - 40px);
                        height: 3px;
                        background: #115dd8;
                        background: linear-gradient(to right, #115dd8 0%, #115dd8 20%, #ddd 20%, #ddd 100%);
                    }

                    .recommend {
                        flex: 1 0 10px;

                        p {
                            margin: 0;
                            font-family: "Montserrat", sans-serif;
                            text-transform: uppercase;
                            font-weight: 600;
                            font-size: 14px;
                            color: #555;
                        }

                        h3 {
                            margin: 0;
                            font-size: 20px;
                            font-family: "Montserrat", sans-serif;
                            font-weight: 600;
                            text-transform: uppercase;
                            color: #115dd8;
                        }
                    }

                    .action {
                        button {
                            cursor: pointer;
                            border: 1px solid #115dd8;
                            padding: 14px 30px;
                            border-radius: 200px;
                            color: #fff;
                            background: #115dd8;
                            font-family: "Open Sans", sans-serif;
                            font-size: 16px;
                            transition: 200ms;

                            &:hover {
                                background: #fff;
                                color: #115dd8;
                            }
                        }
                    }
                }
            }

</style>
@endsection
