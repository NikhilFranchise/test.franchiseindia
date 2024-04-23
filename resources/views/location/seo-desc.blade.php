@php
    $h2       = "";
    $desc     = "";
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (strpos($gcodeurl, '.LOC23')){

  $h2   = Config('constants.catDesc.loc23.title');
  $desc = Config('constants.catDesc.loc23.description');

} elseif (strpos($gcodeurl, 'all/all')){

    $h2   = Config('constants.catDesc.all.title');
    $desc = Config('constants.catDesc.all.description');

} elseif (strpos($gcodeurl, '/lowcost')) {

    $h2   = Config('constants.catDesc.lowcost.title');
    $desc = Config('constants.catDesc.lowcost.description');

} elseif (strpos($gcodeurl, '.LOC9')) {

    $h2   = Config('constants.catDesc.loc9.title');
    $desc = Config('constants.catDesc.loc9.description');

} elseif (strpos($gcodeurl, '.LOC15')) {

    $h2   = Config('constants.catDesc.loc15.title');
    $desc = Config('constants.catDesc.loc15.description');

} elseif (strpos($gcodeurl, '.LOC18')) {

    $h2   = Config('constants.catDesc.loc18.title');
    $desc = Config('constants.catDesc.loc18.description');

} elseif (strpos($gcodeurl, '.LOC29')){

    $h2   = Config('constants.catDesc.loc29.title');
    $desc = Config('constants.catDesc.loc29.description');

}  elseif (strpos($gcodeurl, '.LOC1')) {

    $h2   = Config('constants.catDesc.loc1.title');
    $desc = Config('constants.catDesc.loc1.description');

}  else {
    if(empty($sc)){
        $h2 = Config('constants.catDesc.'.$mc.'.title');
    }
   if(!empty($sc)){
        if($sc > 268){
            $h2 = Config('constants.catDesc.'.$mc.'.title');
        }
        if(!($sc > 268)){
            $h2 = Config('constants.catDesc.'.$sc.'.title');
        }
   }
    if(empty($sc)) {
        $desc = Config('constants.catDesc.'.$mc.'.description');
    }
    if(!empty($sc)){
        if($sc > 268){
            $desc = Config('constants.catDesc.'.$mc.'.description');
        }
        if(!($sc > 268)){
            $desc = Config('constants.catDesc.'.$sc.'.description');
        }
   }
}


if (strpos($gcodeurl, '.LOC10') || strpos($gcodeurl, '.LOC14')){

    if(empty($sc)){
            $h2 = Config('constants.catDesc.'.$mc.'.title');
        }
       if(!empty($sc)){
            if($sc > 268){
                $h2 = Config('constants.catDesc.'.$mc.'.title');
            }
            if(!($sc > 268)){
                $h2 = Config('constants.catDesc.'.$sc.'.title');
            }
       }
        if(empty($sc)) {
            $desc = Config('constants.catDesc.'.$mc.'.description');
        }
        if(!empty($sc)){
            if($sc > 268){
                $desc = Config('constants.catDesc.'.$mc.'.description');
            }
            if(!($sc > 268)){
                $desc = Config('constants.catDesc.'.$sc.'.description');
            }
       }

}
@endphp

@if(!empty($h2))
    <div class="back-bg-home hidden-xs">
        <div class="container">
            <div class="company-profile">
                <h2 class="catbheading">
                    {{$h2}}
                </h2>
                <p class="company-txt">
                    {!!$desc!!}
                </p>
            </div>
        </div>
        <button id="buttonAreaHide" class="hidetxt"></button>
        <button id="buttonAreaShow" class="showtxt"></button>
    </div>
@endif