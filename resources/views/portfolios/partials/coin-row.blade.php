<tr>
    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $coin->id }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $coin->name }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $coin->amount }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $coin->cost }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $coin->note }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        <a href="{{ route('coin.edit', $coin->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons mdl-color-text--white">edit</i>
            <span class="sr-only">Edit Coin</span>
        </a>
        {!! Form::open(array('class' => 'inline-block', 'id' => 'delete_'.$coin->id, 'method' => 'DELETE', 'route' => array('coin.destroy', $coin->id))) !!}
            {{ method_field('DELETE') }}
            <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$coin->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-coinid="{{$coin->id}}">
                <i class="material-icons mdl-color-text--white">delete_forever</i>
                <span class="sr-only">Delete Coin</span>
            </a>
        {!! Form::close() !!}
    </td>

</tr>