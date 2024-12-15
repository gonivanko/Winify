@php
    $colorStyle = "border";
    if ($attributes->has('variant')) {
        switch ($attributes->get('variant')) {
            case 'red':
                $colorStyle = "bg-backgroundRed text-textRed";
                break;
            case 'yellow':
                $colorStyle = "bg-backgroundYellow text-textYellow";
                break;
            case 'green':
                $colorStyle = "bg-backgroundGreen text-textGreen";
                break;
            default:
                break;
        }
    }
    $font_weight = "";
    if ($attributes->has('weight')) {$font_weight = $weight;}
@endphp

<div 
    class="flex items-center self-start p-2 rounded-lg {{$colorStyle}} {{$font_weight}}"
>
    {{$slot}}
</div>




