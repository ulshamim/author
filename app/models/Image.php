<?php

class Image extends Eloquent {

    public function imageable() {
        return $this->morphTo();
    }

}
