<div class="inline fields variation">
    <div class="field">
        <div class="ui left icon input">
            <i class="tasks icon"></i>
            <input placeholder="Variation Name" type="text" name="variations[{{$variation_number}}][name]" value="{{$variation["name"] or ""}}"  >
        </div>
    </div>
    <div class="field mini">
        <div class="ui left icon input">
            <i class="money icon"></i>
            <input placeholder="Variation price" type="text" name="variations[{{$variation_number}}][price]" value="{{$variation["price"] or ""}}"  >
        </div>
    </div>
    <div class="field">
        <div class="ui left icon input">
            <i class="file image outline icon"></i>
            <input placeholder="Variation Image" type="text" name="variations[{{$variation_number}}][image]" value="{{$variation["image"] or ""}}"  >
        </div>
    </div>
    <div class="field remove-variation">
        <div class="ui vertical animated button" tabindex="0">
            <div class="hidden content">Remove</div>
            <div class="visible content">
                <i class="trash alternate icon"></i>
            </div>
        </div>
    </div>
</div>