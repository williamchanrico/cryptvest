@php
    $totalPercentProfit = ((float) $netWorth - $totalInvested) / $totalInvested * 100;
    $highestCoin = ['profit' => -1000000];
    $lowestCoin = ['profit' => 1000000];
@endphp

<div class="mdl-grid mdl-cell--10-col mdl-cell--1-offset">
    <div class="mdl-cell mdl-card mdl-shadow--4dp margin-top-1-important mdl-cell--4-col">
        <div class="mdl-card__title mdl-card--expand">
            <h4>
                ${{ number_format((float) $netWorth, 2) }}
            </h4>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-js-button mdl-button--default">
                Total Net Worth
            </button>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp margin-top-1-important mdl-cell--4-col">
        <div class="mdl-card__title mdl-card--expand">
            <h4>
                ${{ number_format((float) $totalInvested, 2) }}
            </h4>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-js-button mdl-button--default">
                Total Invested
            </button>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp margin-top-1-important mdl-cell--4-col">
        <div class="mdl-card__title mdl-card--expand {{ $totalPercentProfit < 0 ? "mdl-color-text--red" : "mdl-color-text--green" }}">
            <h4>
                {{ number_format($totalPercentProfit, 2) }}%
            </h4>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-js-button mdl-button--default">
                Total Profit
            </button>
        </div>
    </div>
</div>

<div class="mdl-grid mdl-cell--10-col mdl-cell--1-offset">
    <div class="mdl-cell mdl-card mdl-shadow--4dp margin-top-1-important mdl-cell--4-col">
        <div class="mdl-card--expand">
            <div id="donut-coins-type-breakdown" style=""></div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-js-button mdl-button--default">
                Coins Breakdown
            </button>
        </div>
    </div>
    <div class="mdl-cell mdl-card mdl-shadow--4dp margin-top-1-important mdl-cell--8-col">
        <div class="mdl-card--expand">
            <div id="donut-coins-cost-breakdown" style=""></div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-js-button mdl-button--default">
                Diversified Cost
            </button>
        </div>
    </div>
</div>

<div class="mdl-grid mdl-cell--10-col mdl-cell--1-offset">

    <table class="mdl-cell mdl-color--white-100 margin-top-1-important mdl-shadow--4dp mdl-data-table mdl-js-data-table  mdl-cell--12-col">
        <thead>
        <tr>
            <th style="width:20px">#</th>
            <th class="mdl-data-table__cell--non-numeric">{{ trans('titles.mcName') }}</th>
            <th>{{ trans('titles.mcTotalInvested') }}</th>
            <th>{{ trans('titles.mcOwned') }}</th>
            <th>{{ trans('titles.mcCurrentPrice') }}</th>
            <th>{{ trans('titles.mcProfit') }}</th>
            <th>{{ trans('titles.mcWorth') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coins as $coin)
            @php
                $coinMc = $marketcap[$m[$coin['name']]];
                $price = $coinMc->price_usd;
                $worth = $price * $coin['amount'];
                $profit = $worth - $coin['cost'];
                $percentProfit = (float) $profit / $coin['cost'] * 100.0;

                if($percentProfit > $highestCoin['profit'])
                {
                    $highestCoin['profit'] = $percentProfit;
                    $highestCoin['name'] = $coin['name'];
                }

                if($percentProfit < $lowestCoin['profit'])
                {
                    $lowestCoin['profit'] = $percentProfit;
                    $lowestCoin['name'] = $coin['name'];
                }
            @endphp
            <tr id="{{ $coin['name'] }}">
                <td>{{ $loop->iteration }}</td>
                <td class="mdl-data-table__cell--non-numeric"><img src="https://files.coinmarketcap.com/static/img/coins/16x16/{{ $coinMc->id }}.png" alt=""> {{ $coin['name'] }}</td>
                <td>${{ number_format((float) $coin['cost'], 2) }}</td>
                <td>{{ $coin['amount'] . " " . $coinMc->symbol }} </td>
                <td>${{ number_format((float) $price, 4) }}</td>
                <td class="{{ (float) $percentProfit  < 0 ? "mdl-color-text--red" : "mdl-color-text--green" }}">{{ number_format((float) $percentProfit, 2) }}%</td>
                <td>${{ number_format((float) $worth, 2) }}</td>
            </tr>
            @if(!empty($coin['note']))
                <div class="mdl-tooltip" for="{{ $coin['name'] }}">
                    {{ $coin['note'] }}
                </div>
            @endif
        @endforeach
        <tr>
            <td></td>
            <td class="mdl-data-table__cell--non-numeric"><img src="https://files.coinmarketcap.com/static/img/coins/16x16/tether.png" alt=""> TOTAL</td>
            <td>${{ number_format((float) $totalInvested, 2) }}</td>
            <td></td>
            <td></td>
            <td class="{{ $totalPercentProfit < 0  ? "mdl-color-text--red" : "mdl-color-text--green" }}">{{ number_format($totalPercentProfit, 2) }}%</td>
            <td>${{ number_format((float) $netWorth, 2) }}</td>
        </tr>
        </tbody>
    </table>
</div>
