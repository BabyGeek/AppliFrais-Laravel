<li>
    <div class="message_date">
    <h3 class="date text-info">{{ $package->date->format('m') }}</h3>
    <p class="month">{{ $package->date->format('Y') }}</p>
    </div>
    <div class="message_wrapper">
    <h4 class="heading">{{ $package->date->toFormattedDateString() }} - {{ Modules\Costs\Enum\CostState::create($package->state) }}</h4>
    <blockquote class="message">
        {{ $package->value }} {{ Modules\Costs\Enum\CostType::create($package->cost->type) }} : {{ $package->getValueForPackage($package) }} €
    </blockquote>
    <br>
    </div>
</li>