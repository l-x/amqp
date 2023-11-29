package amqpjobs

import (
	"strconv"

	amqp "github.com/rabbitmq/amqp091-go"
	"go.uber.org/zap"
)

func convHeaders(h amqp.Table, log *zap.Logger) map[string][]string { //nolint:gocyclo
	ret := make(map[string][]string, len(h))
	for k := range h {
		// mut ret
		convHeadersAnyType(&ret, k, h[k], log)
	}

	return ret
}

func convHeadersAnyType(ret *map[string][]string, k string, header any, log *zap.Logger) {
	switch t := header.(type) {
	case int:
		(*ret)[k] = append((*ret)[k], strconv.Itoa(t))
	case int8:
		(*ret)[k] = append((*ret)[k], strconv.Itoa(int(t)))
	case int16:
		(*ret)[k] = append((*ret)[k], strconv.Itoa(int(t)))
	case int32:
		(*ret)[k] = append((*ret)[k], strconv.Itoa(int(t)))
	case int64:
		(*ret)[k] = append((*ret)[k], strconv.FormatInt(t, 10))
	case uint:
		(*ret)[k] = append((*ret)[k], strconv.FormatUint(uint64(t), 10))
	case uint8:
		(*ret)[k] = append((*ret)[k], strconv.FormatUint(uint64(t), 10))
	case uint16:
		(*ret)[k] = append((*ret)[k], strconv.FormatUint(uint64(t), 10))
	case uint32:
		(*ret)[k] = append((*ret)[k], strconv.FormatUint(uint64(t), 10))
	case uint64:
		(*ret)[k] = append((*ret)[k], strconv.FormatUint(t, 10))
	case float32:
		(*ret)[k] = append((*ret)[k], strconv.FormatFloat(float64(t), 'f', 5, 64))
	case float64:
		(*ret)[k] = append((*ret)[k], strconv.FormatFloat(t, 'f', 5, 64))
	case string:
		(*ret)[k] = append((*ret)[k], t)
	case []string:
		(*ret)[k] = append((*ret)[k], t...)
	case bool:
		switch t {
		case true:
			(*ret)[k] = []string{"true"}
		case false:
			(*ret)[k] = []string{"false"}
		}
	case []byte:
		(*ret)[k] = append((*ret)[k], string(t))
	case []any:
		for _, v := range t {
			// we need to recursively call this function to handle nested slices of primitives
			convHeadersAnyType(ret, k, v, log)
		}
	default:
		// we don't know what this is, so we'll just ignore it
		log.Warn("unknown header type", zap.String("key", k), zap.Any("value", t))
	}
}
