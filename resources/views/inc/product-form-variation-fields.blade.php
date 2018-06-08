<div class="inline fields variation ui grid">
    <div class="field five wide column">
        <div class="ui left icon input">
            <i class="tasks icon"></i>
            <input placeholder="Variation Name" type="text" name="variations[{{$variation_number}}][name]" value="{{$variation["name"] or ""}}"  >
        </div>
    </div>
    <div class="field mini three wide column">
        <div class="ui left icon input">
            <i class="money icon"></i>
            <input placeholder="Var. price" type="text" name="variations[{{$variation_number}}][price]" value="{{$variation["price"] or ""}}"  >
        </div>
    </div>
    <div class="field mini three wide column">
        <div class="ui left icon input">
            <i class="money icon"></i>
            <input placeholder="Var. in stock" type="text" name="variations[{{$variation_number}}][stock]" value="{{$variation["stock"] or ""}}"  >
        </div>
    </div>
    @if(!empty($product_images) && is_array($product_images))
    <div class="field three wide column">
        <div class="ui fluid selection dropdown">
            <input name="variations[{{$variation_number}}][image]" type="hidden"
            @if(!empty($variation["image"]))
                value="{{$variation["image"]}}"
            @endif>
            <i class="dropdown icon"></i>
            <div class="default text">Select Image</div>

            <div class="menu">
                @foreach($product_images as $image)
                    <div class="item" data-value="{{$image}}">
                        <img class="ui mini avatar image" src="{{\imake\Image::getThumb($image, [100,100])}}">
                        {{substr(basename($image), 0, 10)}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="field remove-variation two wide column">
        <div class="ui vertical animated button" tabindex="0">
            <div class="hidden content">Remove</div>
            <div class="visible content">
                <i class="trash alternate icon"></i>
            </div>
        </div>
    </div>
</div>