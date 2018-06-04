@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fileuploader.css')}}">
    <script src="{{asset('js/jquery.fileuploader.min.js')}}"></script>
    <script>
        <?php $images = json_decode(old("fileuploader-list-images"));?>
        $(document).ready(function () {
            window.product_images = [];
            $('input#images').fileuploader({
                extensions: ['jpg', 'jpeg', 'png'],
                changeInput: ' ',
                theme: 'thumbnails',
                enableApi: true,
                addMore: true,
                @if($images)
                files:[
                    @foreach($images as $image)
                        {name: '{{str_replace("0:/", "", $image->file)}}',
                        size: 1024,
                        type: 'image/jpeg',
                        file: '{{str_replace("0:/", "", $image->file)}}'},
                    @endforeach
                ],
                @endif
                onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {

                },
                thumbnails: {
                    box: '<div class="fileuploader-items">' +
                    '<ul class="fileuploader-items-list" >' +
                    '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                    '</ul>' +
                    '</div>',
                    item: '<li class="fileuploader-item file-has-popup">' +
                    '<div class="fileuploader-item-inner">' +
                    '<div class="type-holder">${extension}</div>' +
                    '<div class="actions-holder">' +
                    '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                    '</div>' +
                    '<div class="thumbnail-holder">' +
                    '${image}' +
                    '<span class="fileuploader-action-popup"></span>' +
                    '</div>' +
                    '<div class="content-holder"></div>' +
                    '<div class="progress-holder">${progressBar}</div>' +
                    '</div>' +
                    '</li>',
                    item2: '<li class="fileuploader-item file-has-popup">' +
                    '<div class="fileuploader-item-inner">' +
                    '<div class="type-holder">${extension}</div>' +
                    '<div class="actions-holder">' +
                    '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i></i></a>' +
                    '<a class="fileuploader-action fileuploader-action-sort" title="${captions.sort}"><i></i></a>' +
                    '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                    '</div>' +
                    '<div class="thumbnail-holder">' +
                    '${image}' +
                    '<span class="fileuploader-action-popup"></span>' +
                    '</div>' +
                    '<div class="content-holder"><span></span></div>' +
                    '<div class="progress-holder">${progressBar}</div>' +
                    '</div>' +
                    '</li>',
                    startImageRenderer: false,
                    canvasImage: false,
                    _selectors: {
                        list: '.fileuploader-items-list',
                        item: '.fileuploader-item',
                        start: '.fileuploader-action-start',
                        retry: '.fileuploader-action-retry',
                        remove: '.fileuploader-action-remove'
                    },
                    onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                            api = $.fileuploader.getInstance(inputEl.get(0));

                        plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                        if(item.format == 'image') {
                            item.html.find('.fileuploader-item-icon').hide();
                        }
                    }
                },
                dragDrop: {
                    container: '.fileuploader-thumbnails-input'
                },
                afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    plusInput.on('click', function() {
                        api.open();
                    });
                },
                upload: {
                    url: '{{ route('images.store') }}',
                    data: null,
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    start: true,
                    synchron: true,
                    chunk: false,
                    beforeSend: function(item, listEl, parentEl, newInputEl, inputEl) {
                        item.upload.headers = {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        };
                        return true;
                    },
                    onSuccess: function(data, item, listEl, parentEl, newInputEl, inputEl, textStatus, jqXHR) {
                        if(!data) {
                            item.remove();
                            //    listEl.remove();
                            //    parentEl.remove();
                            newInputEl.remove();
                            newInputEl.remove();
                            inputEl.remove();
                            textStatus.remove();
                            jqXHR.remove();
                        }else {
                            window.product_images.push(data);
                            newInputEl.img = data;
                            item.name = data;
                            item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                            setTimeout(function () {
                                item.html.find('.progress-holder').hide();
                                item.renderThumbnail();

                                item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
                                item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-sort" title="Sort"><i></i></a>');
                            }, 400);
                        }
                    },
                    onError: function(item) {
                        item.html.find('.progress-holder, .fileuploader-action-popup, .fileuploader-item-image').hide();
                    },
                    onProgress: function(data, item) {
                        var progressBar = item.html.find('.progress-holder');

                        if(progressBar.length > 0) {
                            progressBar.show();
                            progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                        }

                        item.html.find('.fileuploader-action-popup, .fileuploader-item-image').hide();
                    },

                    // Callback fired after all files were uploaded
                    onComplete: function(listEl, parentEl, newInputEl, inputEl, jqXHR, textStatus) {
                        // callback will go here
                    }
                }
,
                sorter: {
                    selectorExclude: null,
                    placeholder: null,
                    scrollContainer: window,
                    onSort: function(list, listEl, parentEl, newInputEl, inputEl) {
                        var api = $.fileuploader.getInstance(inputEl.get(0)),
                            fileList = api.getFileList(),
                            _list = [];

                        $.each(fileList, function(i, item) {
                            _list.push({
                                name: item.name,
                                index: item.index,
                                test: 888
                            });
                        });
                    }
                },
                onRemove: function(item, input, inp2, inputEl) {
                    window.product_images.find(function (element, index, array) {
                        if(element === array[index]){
                            window.product_images.splice(index, 1)
                        }
                    })
                }
            });
        })
    </script>
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">New Product</a>
                </div>
            </div>
        </div>
        <div class="ui stackable grid">

            <div class="column sidebar">
                @include('inc.account-sidebar', ['active' => 'create-product'])
            </div>

            <div class="page-conent column">
                @if ($errors->all())
                    <div class="ui error message">
                        <ul class="list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="ui top attached tabular menu tabs">
                    <a class="active item" data-tab="general">General</a>
                    <a class="item" data-tab="attributes">Attributes</a>
                    <a class="item" data-tab="images">Images</a>
                    <a class="item" data-tab="variations">Variations</a>
                </div>
                    <form class="ui form error no-border" enctype="multipart/form-data" method="post" action="{{ route('products.store') }}">
                    <div class="ui bottom attached active tab segment" data-tab="general">
                        {{ csrf_field() }}
                        <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                            <label>Product name *</label>
                            <div class="ui left icon input">
                                <input placeholder="Shop name" type="text" name="name" value="{{ old('name') }}" required>
                                <i class="shopping bag icon"></i>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('description') ? 'error' : '' }}">
                            <label>Product description *</label>
                            <div class="ui left icon input">
                                <textarea placeholder="Shop description" name="description"  required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field {{ $errors->has('regular_price') ? 'error' : '' }}">
                                <label>Product regular price *</label>
                                <div class="ui left icon input">
                                    <i class="money icon"></i>
                                    <input placeholder="Regular price" type="text" name="regular_price" value="{{old("regular_price")}}"  required>
                                </div>
                            </div>
                            <div class="field {{ $errors->has('sale_price') ? 'error' : '' }}">
                                <label>Product sale price</label>
                                <div class="ui left icon input">
                                    <i class="money icon"></i>
                                    <input placeholder="Sale price" type="text" name="sale_price" value="{{old("sale_price")}}"  >
                                </div>
                            </div>
                            <div class="field {{ $errors->has('stock') ? 'error' : '' }}">
                                <label>Stock *</label>
                                <div class="ui left icon input">
                                    <i class="cubes icon"></i>
                                    <input placeholder="Stock" type="text" name="stock" value="{{old("stock")}}"  required>
                                </div>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('categories') ? 'error' : '' }}">
                            <label>Product Categories</label>
                            <div class="ui left icon input">
                                <select class="ui fluid search dropdown" multiple="" name="categories[]">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(in_array($category->id, old("categories", []))) selected="selected" @endif>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="attributes">
                        <div class="field {{ $errors->has('colors') ? 'error' : '' }}">
                            <label>Product color variations</label>
                            <div class="ui left icon input">
                                <select class="ui fluid search dropdown" multiple="" name="colors[]">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" @if(in_array($color->id, old("colors", []))) selected="selected" @endif>{{$color->color_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('tags') ? 'error' : '' }}">
                            <label>Product tags</label>
                            <div class="ui left icon input">
                                <select class="ui fluid search dropdown" multiple="" name="tags[]">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" @if(in_array($tag->id, old("tags", []))) selected="selected" @endif>{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field {{ $errors->has('weight') ? 'error' : '' }}">
                                <label>Weight</label>
                                <div class="ui left icon input right labeled">
                                    <i class="cube icon"></i>
                                    <input placeholder="Weight" type="text" name="weight" value="{{old("weight")}}"  >
                                    <div class="ui label">
                                        gr.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field {{ $errors->has('length') ? 'error' : '' }}">
                                <label>Length</label>
                                <div class="ui left icon input right labeled">
                                    <i class="resize horizontal icon"></i>
                                    <input placeholder="Length" type="text" name="length" value="{{old("length")}}"  >
                                    <div class="ui label">
                                        cm.
                                    </div>
                                </div>
                            </div>
                            <div class="field {{ $errors->has('width') ? 'error' : '' }}">
                                <label>Width</label>
                                <div class="ui left icon input right labeled">
                                    <i class="resize vertical icon"></i>
                                    <input placeholder="Width" type="text" name="width" value="{{old("width")}}"  >
                                    <div class="ui label">
                                        cm.
                                    </div>
                                </div>
                            </div>
                            <div class="field {{ $errors->has('height') ? 'error' : '' }}">
                                <label>Height</label>
                                <div class="ui left icon input right labeled">
                                    <i class="resize horizontal icon"></i>
                                    <input placeholder="Height" type="text" name="height" value="{{old("height")}}"  >
                                    <div class="ui label">
                                        cm.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="ui bottom attached tab segment" data-tab="images">
                        <div class="field {{ $errors->has('images') ? 'error' : '' }}">
                            <label>Product images</label>
                            <div class="ui left icon input">
                                <input placeholder="Images" type="file" value="" name="images[]" multiple id="images" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="variations">
                        <?php dump(old("variations")); ?>

                        <div class="added-variations">
                            @if(old("variations"))
                                @foreach(old("variations") as $variation_number => $variation)
                                    @include("inc.product-form-variation-fields", ["variation" => $variation, "variation_number" => $variation_number])
                                @endforeach
                            @endif
                        </div>

                        <button class="mini ui button add-variation" type="button">
                            <i class="plus circle icon"></i>
                            Add variation
                        </button>
                    </div>


                        <button class="ui button primary" ><i class="save icon"></i> Save Product</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.ui.checkbox').checkbox({
                onIndeterminate: function () {
                    alert('onEnable');
                },
                onChecked: function () {
                    var value = $(this).attr('id');
                    $('.pay-type.'+value).show();
                },
                onUnchecked: function () {
                    var value = $(this).attr('id')
                    $('.pay-type.'+value).hide();

                }
            });


            $(".add-variation").click(function (response) {
                var variation_number = $.now();
                $.get('/product-form-variation-fields', { variation_number: variation_number, product_images: window.product_images }, function(response){
                    $(".added-variations").append(response);
                    $('.ui.dropdown').dropdown() ;
                });
            })
            $(".added-variations").delegate(".remove-variation", "click", function () {
                $(this).closest(".variation").remove()
            })
        })
    </script>
@endsection

@section('footer')
    @parent
@endsection