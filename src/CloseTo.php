<?php

namespace JaeJamesDev\LaravelCloseTo;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class CloseTo {

    /**
     * Register macros on the Query Builder.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return void
     */
    public function apply()
    {
        $this->createMacro();
    }

    public function createMacro()
    {
        /**
         * Query scope periods - filter this or last/next N periods
         *
         * @param  \Illuminate\Database\Query\Builder $query
         * @param  float  $latitude Period type [minute|hour|day|week|month|year]
         * @param  float $longitude Number of past periods
         * @param  int  $distance   Column to match against
         * @param string $latitudeColumnName  Column name for the latitude column if it is not called latitude
         * @param string $longitudeColumnName  Column name for the latitude column if it is not called latitude
         * @return \Illuminate\Database\Query\Builder
         *
         */
        Builder::macro('closeTo', function($latitude, $longitude, $distance, $latitudeColumnName = 'latitude', $longitudeColumnName = 'longitude') {
            $haversine = "(3959 * acos(cos(radians($latitude)) * cos(radians($latitudeColumnName)) * cos(radians($longitudeColumnName) - radians($longitude)) + sin(radians($latitude)) * sin(radians($latitudeColumnName))))";
            return $this
                ->select('*')
                ->selectRaw("{$haversine} AS distance")
                ->whereRaw("{$haversine} < ?", [$distance]);
        });
    }

}
