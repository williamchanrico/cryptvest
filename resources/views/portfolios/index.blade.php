@extends('layouts.dashboard')

@section('template_title')
    My Portfolio
@endsection

@section('template_fastload_css')
@endsection

@section('header')
    My Portfolio
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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
        <a itemprop="item" href="" class="">
            <span itemprop="name">
                Portfolio
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

@endsection

@section('content')
    @if (count($coinsOwned) > 0)

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

            <div class="mdl-tabs__tab-bar">
                <a href="#all" class="mdl-tabs__tab is-active">All</a>
            </div>

            <div class="mdl-color--grey-700 mdl-card dark-table mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0 mdl-tabs__panel is-active" id="all">
                <div class="mdl-card__title mdl-color-text--white">
                    <h2 class="mdl-card__title-text logo-style">
                        All Coins
                    </h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--white padding-0">
                    <div class="table-responsive material-table inverse">
                        <table class="mdl-color--grey-700 mdl-color-text--white mdl-data-table-block mdl-js-data-table data-table full-span table-striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th class="mdl-data-table__cell--non-numeric mdl-color-text--white hide-mobile">ID</th>
                                <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Name</th>
                                <th class="mdl-data-table__cell--non-numeric mdl-color-text--white hide-mobile">Amount</th>
                                <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Cost</th>
                                <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Note</th>
                                <th class="mdl-data-table__cell--non-numeric mdl-color-text--white no-sort no-search">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($coinsOwned as $coin)

                                @include('portfolios.partials.coin-row')

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mdl-card__menu">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable search-white padding-top-0 hide-mobile">
                        <label class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon" for="search_table">
                            <i class="material-icons">search</i>
                        </label>

                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="search" id="search_table" placeholder="Search Terms">
                            <label class="mdl-textfield__label" for="search_table">
                                Search Terms
                            </label>
                        </div>
                    </div>
                    <a href="{{ route('coin.create') }}" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block">
                        <i class="material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>

        @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Coin Deletion', 'dialogSaveBtnText' => 'Delete'])

    @else
        <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell margin-top-0-important mdl-cell--6-col mdl-cell--6-col-tablet mdl-cell--6-col-desktop mdl-cell--3-offset">
            <div class="{{ $userCardBg }} mdl-card__title @if (Auth::user()->profile->user_profile_bg == NULL) @endif" @if (Auth::user()->profile->user_profile_bg != NULL) style="background: url('{{Auth::user()->profile->user_profile_bg}}') center/cover;" @endif>
                <h2 class="mdl-card__title-text mdl-title-username mdl-color-text--white text-center">
                    You don't have any coins yet!
                </h2>
            </div>

            @include('portfolios.partials.create-new-coin')
        </div>
    @endif

@endsection

@section('footer_scripts')

    @if (count($coinsOwned) > 0)

        @include('scripts.mdl-datatables')

        <script type="text/javascript">

            @foreach ($coinsOwned as $coin)
                mdl_dialog('.dialiog-trigger{{$coin->id}}','','#dialog_delete');
            @endforeach

            var coinId;

            $('.dialiog-trigger-delete').click(function(event) {
                event.preventDefault();
                coinId = $(this).attr('data-coinid');
            });

            $('#confirm').click(function(event) {
                $('form#delete_'+coinId).submit();
            });

        </script>

    @else

        @include('scripts.mdl-required-input-fix')

        <script type="text/javascript">
            mdl_dialog('.dialog-button-save');
            mdl_dialog('.dialog-button-icon-save');
        </script>

    @endif

@endsection