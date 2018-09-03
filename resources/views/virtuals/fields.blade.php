<!-- Trx Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trx_id', 'Trx Id:') !!}
    {!! Form::number('trx_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Trx Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trx_amount', 'Trx Amount:') !!}
    {!! Form::number('trx_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Virtual Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('virtual_account', 'Virtual Account:') !!}
    {!! Form::text('virtual_account', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Expired Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expired', 'Expired:') !!}
    {!! Form::text('expired', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe', 'Tipe:') !!}
    {!! Form::text('tipe', null, ['class' => 'form-control']) !!}
</div>

<!-- Jalur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jalur', 'Jalur:') !!}
    {!! Form::text('jalur', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('virtuals.index') !!}" class="btn btn-default">Cancel</a>
</div>
