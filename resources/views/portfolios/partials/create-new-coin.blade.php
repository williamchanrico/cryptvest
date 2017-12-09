{!! Form::model(new App\Models\Coin, ['route' => ['coin.store'], 'class'=>'', 'role' => 'form']) !!}

    <div class="mdl-card__supporting-text">
        <div class="mdl-grid full-grid padding-0">
            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                <div class="mdl-cell mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset">
                    <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-select__fullwidth" style="width: 100%;">
                        <select id="name" name="name" class="mdl-selectfield__select">
                            <option value=""></option>
                            @foreach($coins as $coin)
                                <option value="{{ $coin->name }}">{{ $coin->name }}</option>
                            @endforeach
                        </select>
                        <label class="mdl-selectfield__label mdl-color-text--black" for="name">Coin Name</label>
                        <span class="mdl-textfield__error">Select a value</span>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('amount') ? 'is-invalid' :'' }}">
                        {!! Form::text('amount', NULL, array('id' => 'amount', 'class' => 'mdl-textfield__input mdl-color-text--black')) !!}
                        {!! Form::label('amount', 'Coin Amount', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                        <span class="mdl-textfield__error">Coin Amount is Invalid</span>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('cost') ? 'is-invalid' :'' }}">
                        {!! Form::text('cost', NULL, array('id' => 'cost', 'class' => 'mdl-textfield__input mdl-color-text--black')) !!}
                        {!! Form::label('cost', 'Total Cost', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                        <span class="mdl-textfield__error">Total Cost is Invalid</span>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('note') ? 'is-invalid' :'' }}">
                        {!! Form::text('note', NULL, array('id' => 'note', 'class' => 'mdl-textfield__input mdl-color-text--black')) !!}
                        {!! Form::label('note', 'Note (optional)', array('class' => 'mdl-textfield__label mdl-color-text--black')); !!}
                        <span class="mdl-textfield__error">Note is Invalid</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mdl-card__actions padding-top-0">
        <div class="mdl-grid padding-top-0">
            <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                <span class="save-actions">
                    {!! Form::button('Add Coin', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                </span>

            </div>
        </div>
    </div>

    <div class="mdl-card__menu mdl-color-text--white">

        <span class="save-actions">
            {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button-colored', 'title' => 'Add Coin')) !!}
        </span>

    </div>

    @include('dialogs.dialog-save')

{!! Form::close() !!}