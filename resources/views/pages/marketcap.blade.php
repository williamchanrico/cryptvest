@extends('layouts.dashboard')

@section('template_title')
    {{ trans('titles.marketcap') }}
@endsection

@section('header')
    {{ trans('titles.marketcap') }}
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
    <li class="active">
        {{ trans('titles.marketcap') }}
    </li>

@endsection

@section('head')
@endsection

@section('content')
    <div class="mdl-grid mdl-cell--10-col mdl-cell--1-offset ">

        <table class="data-table mdl-color--white-100 mdl-data-table mdl-js-data-table mdl-shadow--4dp mdl-cell--12-col">
            <thead>
            <tr>
                <th style="width:20px">#</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('titles.mcName') }}</th>
                <th>{{ trans('titles.mcMarketcap') }}</th>
                <th>{{ trans('titles.mcPrice') }}</th>
                <th>{{ trans('titles.mcCirculatingSupply') }}</th>
                <th>{{ trans('titles.mcPercentChange24h') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($coins as $coin)
                <tr>
                    <td>{{ $coin->rank }}</td>
                    <td class="mdl-data-table__cell--non-numeric"><img src="https://files.coinmarketcap.com/static/img/coins/16x16/{{ $coin->id }}.png" alt=""> {{ $coin->name }}</td>
                    <td>${{ number_format((float) $coin->market_cap_usd, 2) }}</td>
                    <td>${{ number_format((float) $coin->price_usd, 4) }}</td>
                    <td>{{ number_format((float) $coin->total_supply, 2) . " " . $coin->symbol}} </td>
                    <td class="{{ (float) $coin->percent_change_24h  < 0 ? "mdl-color-text--red" : "mdl-color-text--green" }}">{{ number_format((float) $coin->percent_change_24h, 2) }}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('footer_scripts')

@endsection