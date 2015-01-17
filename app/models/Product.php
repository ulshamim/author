<?php

class Product extends Eloquent {

    public function images() {
        return $this->morphMany('Image', 'imageable');
    }

}
