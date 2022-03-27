<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * @var string
     */
    protected $table = 'options';

    /**
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'option_key',
        'option_value'
    ];

    /**
     * @var array
     */
    protected $appends = ['value'];

    /**
     * @return mixed
     */
    public function getValueAttribute()
    {
        try {
            $value = @unserialize($this->option_value);

            return $value === false && $this->option_value !== false ?
                $this->option_value :
                $value;
        } catch (Exception $ex) {
            return $this->option_value;
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return Option
     */
    public static function add($key, $value)
    {
        return static::create([
            'option_key' => $key,
            'option_value' => is_array($value) ? @serialize($value) : $value,
        ]);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function get($name)
    {
        if ($option = self::where('option_key', $name)->first()) {
            return $option->value;
        }

        return null;
    }

    /**
     * @return array
     * @deprecated
     */
    public static function getAll()
    {
        return static::asArray();
    }

    /**
     * @param array $keys
     * @return array
     */
    public static function asArray($keys = [])
    {
        $query = static::query();

        if (!empty($keys)) {
            $query->whereIn('option_key', $keys);
        }

        return $query->get()
            ->pluck('value', 'option_key')
            ->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        if ($this instanceof Option) {
            return [$this->option_key => $this->value];
        }

        return parent::toArray();
    }
}
