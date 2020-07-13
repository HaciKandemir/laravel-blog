<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    {{ Form::label($name,$label_name, ['class' => 'control-label']) }}
    <input type="checkbox" name="{{$name}}" class="durum"  {{ empty($makale->durum) ? null : "checked" }} >
    @if($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>