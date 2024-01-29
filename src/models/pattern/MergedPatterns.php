<?

require_once 'IPattern.php';

class MergedPatterns implements IPattern {
    private $patterns; //IPattern

    public function __construct($patterns) {
        $this->patterns = $patterns;
    }

    public function getOffers() {
        $offers = array();
        foreach ($this->patterns as $pattern) {
            array_push($offers, $pattern->getOffers()) ;
        }

        return $offers;
    }

    public function refreshOffers() {

        foreach ($this->patterns as $pattern) {
            $pattern->refreshOffers();
        }
    }
}