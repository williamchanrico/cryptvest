@extends('layouts.dashboard')

@section('template_title')
    Editing Coin
@endsection

@section('header')
    Editing Coin
@endsection

@section('breadcrumbs')
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{url('/')}}">
            <span itemprop="name">
                {{ trans('titles.app') }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/portfolio">
            <span itemprop="name">
                My Portfolio
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{ route('coin.edit', $coin->id) }}">
            <span itemprop="name">
                {{$coin->name}}
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>

@endsection

@section('content')

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--4-col-tablet mdl-cell--4-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0 mdl-cell--4-offset">
            <div class="mdl-color--grey-100 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">
                        {{$coin->name}}
                    </h2>
                </div>

                {!! Form::model($coin, array('action' => array('CoinsController@update', $coin->id), 'method' => 'PUT', 'role' => 'form')) !!}

                    <div class="mdl-card__supporting-text">
                        <div class="mdl-grid full-grid padding-0">
                            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                <div class="mdl-cell mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset">
                                    <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-select__fullwidth">
                                        <select id="name" name="name" class="mdl-selectfield__select">
                                            <option value=""></option>
                                            @foreach($coins as $a)
                                                <option value="{{ $a->name }}" {{ $a->name == $coin->name ? "selected" : "" }}>{{ $a->name }}</option>
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

                                {{-- SAVE BUTTON--}}
                                <span class="save-actions">
                                    {!! Form::button('Update Coin', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                                </span>

                                {{-- DELETE COIN BUTTON--}}
                                {!! Form::button('Delete Coin', array('class' => 'dialog-button-delete mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--accent mdl-button-colored mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop padding-left-1 padding-right-1 ')) !!}

                            </div>
                        </div>
                    </div>

                    <div class="mdl-card__menu mdl-color-text--white">

                        {{-- SAVE ICON --}}
                        <span class="save-actions">
                            {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button-colored', 'title' => 'Update Coin')) !!}
                        </span>

                        {{-- DELETE USER ICON --}}
                        <a href="#" class="dialog-button-delete-icon dialiog-trigger-delete dialiog-trigger{{$coin->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-coinid="{{$coin->id}}" title="Delete Coin">
                            <i class="material-icons">delete</i>
                        </a>

                    </div>

                    @include('dialogs.dialog-save')

                {!! Form::close() !!}

                {!! Form::open(array('class' => '', 'id' => 'delete', 'method' => 'DELETE', 'route' => array('coin.destroy', $coin->id))) !!}
                    {{ method_field('DELETE') }}
                    @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Coin Deletion', 'dialogSaveBtnText' => 'Delete'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')

    @include('scripts.mdl-required-input-fix')

    <script type="text/javascript">
        mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');
        mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');
        mdl_dialog('.dialog-button-delete-icon','.dialog-delete-close','#dialog_delete');
    </script>

@endsection