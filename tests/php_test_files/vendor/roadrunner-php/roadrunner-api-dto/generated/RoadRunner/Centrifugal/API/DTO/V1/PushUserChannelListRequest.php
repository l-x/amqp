<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: centrifugo/api/v1/api.proto

namespace RoadRunner\Centrifugal\API\DTO\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>centrifugal.centrifugo.api.PushUserChannelListRequest</code>
 */
class PushUserChannelListRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string users = 1;</code>
     */
    private $users;
    /**
     * Generated from protobuf field <code>repeated string channels = 2;</code>
     */
    private $channels;
    /**
     * Generated from protobuf field <code>string since = 3;</code>
     */
    protected $since = '';
    /**
     * Generated from protobuf field <code>int32 limit = 4;</code>
     */
    protected $limit = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $users
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $channels
     *     @type string $since
     *     @type int $limit
     * }
     */
    public function __construct($data = NULL) {
        \RoadRunner\Centrifugal\API\DTO\V1\GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string users = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Generated from protobuf field <code>repeated string users = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUsers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->users = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string channels = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * Generated from protobuf field <code>repeated string channels = 2;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChannels($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->channels = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string since = 3;</code>
     * @return string
     */
    public function getSince()
    {
        return $this->since;
    }

    /**
     * Generated from protobuf field <code>string since = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setSince($var)
    {
        GPBUtil::checkString($var, True);
        $this->since = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 limit = 4;</code>
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Generated from protobuf field <code>int32 limit = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setLimit($var)
    {
        GPBUtil::checkInt32($var);
        $this->limit = $var;

        return $this;
    }

}
