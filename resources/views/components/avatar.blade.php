@props([
    'image'     => null,
    'alt'       => 'image',
    'size'      => 'regular',
    'class'     => 'ltr:mr-2 rtl:ml-2 mt-2',
    'stacked'   => false,
    'show_ring' => true,
    'show_dot'  => false,
    'dot_placement' => 'bottom',
    'dot_color' => 'green',
    'sizes'    => [
        'tiny'      => [ 'size_css' => 'w-6 h-6', 'dot_css' => 'left-5' ],
        'small'     => [ 'size_css' => 'w-8 h-8', 'dot_css' => 'left-6' ],
        'medium'    => [ 'size_css' => 'w-10 h-10', 'dot_css' => 'left-8' ],
        'regular'   => [ 'size_css' => 'w-12 h-12', 'dot_css' => 'left-[31px] rtl:right-[31px]' ],
        'big'       => [ 'size_css' => 'w-16 h-16', 'dot_css' => 'left-[46px] rtl:right-[46px]' ],
        'huge'      => [ 'size_css' => 'w-20 h-20', 'dot_css' => 'left-[58px] rtl:right-[58px]' ],
        'omg'       => [ 'size_css' => 'w-28 h-28', 'dot_css' => 'left-[79px] rtl:right-[79px]' ]
    ]
])
@php
    $avatar = $image ?: asset('vendor/bladewind/images/avatar.png');
    $stacked = filter_var($stacked, FILTER_VALIDATE_BOOLEAN);;
    $show_dot = filter_var($show_dot, FILTER_VALIDATE_BOOLEAN);;
    $show_ring = filter_var($show_ring, FILTER_VALIDATE_BOOLEAN);;
    $dot_placement = (in_array($dot_placement, ['top','bottom'])) ? $dot_placement : 'bottom';
    $image_size = $sizes[$size]['size_css'];
    $dot_position_css = $sizes[$size]['dot_css'];
    $stacked_css = ($stacked) ? 'mb-3 !-mr-3' : '';
@endphp
<div class="relative inline-block {{ $image_size }} {{$stacked_css}} {{$class}}">
    <img class="{{ $image_size }} object-cover rounded-full @if($show_ring) ring-2 ring-offset-2 ring-offset-white ring-gray-200/50 dark:ring-0 dark:ring-offset-dark-700/50  @endif"
         src="{{$avatar}}" alt="{{$avatar}}"/>
    @if($show_dot)
        <span class="-{{$dot_placement}}-1 {{$dot_position_css}} absolute w-3 h-3 bg-{{$dot_color}}-500 border-2 border-white dark:border-dark-800 rounded-full"></span>
    @endif
</div>