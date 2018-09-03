<table class="table table-responsive" id="virtuals-table">
    <thead>
        <tr>
            <th>Trx Id</th>
        <th>Trx Amount</th>
        <th>Virtual Account</th>
        <th>Description</th>
        <th>Expired</th>
        <th>Email</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Tipe</th>
        <th>Jalur</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($virtuals as $virtual)
        <tr>
            <td>{!! $virtual->trx_id !!}</td>
            <td>{!! $virtual->trx_amount !!}</td>
            <td>{!! $virtual->virtual_account !!}</td>
            <td>{!! $virtual->description !!}</td>
            <td>{!! $virtual->expired !!}</td>
            <td>{!! $virtual->email !!}</td>
            <td>{!! $virtual->name !!}</td>
            <td>{!! $virtual->phone !!}</td>
            <td>{!! $virtual->tipe !!}</td>
            <td>{!! $virtual->jalur !!}</td>
            <td>
                {!! Form::open(['route' => ['virtuals.destroy', $virtual->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('virtuals.show', [$virtual->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('virtuals.edit', [$virtual->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>