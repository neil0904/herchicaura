<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V13\Resources\Recommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The raise target CPA bid too low recommendation.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.resources.Recommendation.RaiseTargetCpaBidTooLowRecommendation</code>
 */
class RaiseTargetCpaBidTooLowRecommendation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. A number greater than 1.0 indicating the factor by which we
     * recommend the target CPA should be increased.
     *
     * Generated from protobuf field <code>optional double recommended_target_multiplier = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $recommended_target_multiplier = null;
    /**
     * Output only. The current average target CPA of the campaign, in micros of
     * customer local currency.
     *
     * Generated from protobuf field <code>optional int64 average_target_cpa_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $average_target_cpa_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $recommended_target_multiplier
     *           Output only. A number greater than 1.0 indicating the factor by which we
     *           recommend the target CPA should be increased.
     *     @type int|string $average_target_cpa_micros
     *           Output only. The current average target CPA of the campaign, in micros of
     *           customer local currency.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. A number greater than 1.0 indicating the factor by which we
     * recommend the target CPA should be increased.
     *
     * Generated from protobuf field <code>optional double recommended_target_multiplier = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return float
     */
    public function getRecommendedTargetMultiplier()
    {
        return isset($this->recommended_target_multiplier) ? $this->recommended_target_multiplier : 0.0;
    }

    public function hasRecommendedTargetMultiplier()
    {
        return isset($this->recommended_target_multiplier);
    }

    public function clearRecommendedTargetMultiplier()
    {
        unset($this->recommended_target_multiplier);
    }

    /**
     * Output only. A number greater than 1.0 indicating the factor by which we
     * recommend the target CPA should be increased.
     *
     * Generated from protobuf field <code>optional double recommended_target_multiplier = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param float $var
     * @return $this
     */
    public function setRecommendedTargetMultiplier($var)
    {
        GPBUtil::checkDouble($var);
        $this->recommended_target_multiplier = $var;

        return $this;
    }

    /**
     * Output only. The current average target CPA of the campaign, in micros of
     * customer local currency.
     *
     * Generated from protobuf field <code>optional int64 average_target_cpa_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getAverageTargetCpaMicros()
    {
        return isset($this->average_target_cpa_micros) ? $this->average_target_cpa_micros : 0;
    }

    public function hasAverageTargetCpaMicros()
    {
        return isset($this->average_target_cpa_micros);
    }

    public function clearAverageTargetCpaMicros()
    {
        unset($this->average_target_cpa_micros);
    }

    /**
     * Output only. The current average target CPA of the campaign, in micros of
     * customer local currency.
     *
     * Generated from protobuf field <code>optional int64 average_target_cpa_micros = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setAverageTargetCpaMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->average_target_cpa_micros = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RaiseTargetCpaBidTooLowRecommendation::class, \Google\Ads\GoogleAds\V13\Resources\Recommendation_RaiseTargetCpaBidTooLowRecommendation::class);

