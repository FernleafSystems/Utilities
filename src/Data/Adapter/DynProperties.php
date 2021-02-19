<?php

namespace FernleafSystems\Utilities\Data\Adapter;

/**
 * Trait DynProperties
 * @package FernleafSystems\Utilities\Data\Adapter
 * @deprecated 
 */
trait DynProperties {

	private $raw = [];

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function __get( string $key ) {
		return $this->raw[ $key ] ?? null;
	}

	public function __isset( string $key ) :bool {
		return array_key_exists( $key, $this->raw );
	}

	/**
	 * @param string $key
	 * @param mixed  $value
	 * @return $this
	 */
	public function __set( string $key, $value ) :self {
		$this->raw[ $key ] = $value;
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function __unset( string $key ) :self {
		unset( $this->raw[ $key ] );
		return $this;
	}

	public function applyFromArray( $data, array $restrictedKeys = [] ) :self {
		if ( !empty( $restrictedKeys ) ) {
			$data = array_intersect_key( $data, array_flip( $restrictedKeys ) );
		}
		$this->raw = $data;
		return $this;
	}

	public function reset() :self {
		$this->raw = [];
		return $this;
	}

	public function getRawData() :array {
		return is_array( $this->raw ) ? $this->raw : [];
	}

	/**
	 * @return array
	 * @deprecated
	 */
	public function getRawDataAsArray() :array {
		return $this->getRawData();
	}
}