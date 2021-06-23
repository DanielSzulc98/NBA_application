<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'tornados_storage_get' ) ) {
	function tornados_storage_get( $var_name, $default = '' ) {
		global $TORNADOS_STORAGE;
		return isset( $TORNADOS_STORAGE[ $var_name ] ) ? $TORNADOS_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'tornados_storage_set' ) ) {
	function tornados_storage_set( $var_name, $value ) {
		global $TORNADOS_STORAGE;
		$TORNADOS_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'tornados_storage_empty' ) ) {
	function tornados_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $TORNADOS_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $TORNADOS_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $TORNADOS_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $TORNADOS_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'tornados_storage_isset' ) ) {
	function tornados_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $TORNADOS_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $TORNADOS_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $TORNADOS_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $TORNADOS_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'tornados_storage_inc' ) ) {
	function tornados_storage_inc( $var_name, $value = 1 ) {
		global $TORNADOS_STORAGE;
		if ( empty( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = 0;
		}
		$TORNADOS_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'tornados_storage_concat' ) ) {
	function tornados_storage_concat( $var_name, $value ) {
		global $TORNADOS_STORAGE;
		if ( empty( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = '';
		}
		$TORNADOS_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'tornados_storage_get_array' ) ) {
	function tornados_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $TORNADOS_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $TORNADOS_STORAGE[ $var_name ][ $key ] ) ? $TORNADOS_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $TORNADOS_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $TORNADOS_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'tornados_storage_set_array' ) ) {
	function tornados_storage_set_array( $var_name, $key, $value ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$TORNADOS_STORAGE[ $var_name ][] = $value;
		} else {
			$TORNADOS_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'tornados_storage_set_array2' ) ) {
	function tornados_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ][ $key ] ) ) {
			$TORNADOS_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$TORNADOS_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$TORNADOS_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'tornados_storage_merge_array' ) ) {
	function tornados_storage_merge_array( $var_name, $key, $value ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$TORNADOS_STORAGE[ $var_name ] = array_merge( $TORNADOS_STORAGE[ $var_name ], $value );
		} else {
			$TORNADOS_STORAGE[ $var_name ][ $key ] = array_merge( $TORNADOS_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'tornados_storage_set_array_after' ) ) {
	function tornados_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			tornados_array_insert_after( $TORNADOS_STORAGE[ $var_name ], $after, $key );
		} else {
			tornados_array_insert_after( $TORNADOS_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'tornados_storage_set_array_before' ) ) {
	function tornados_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			tornados_array_insert_before( $TORNADOS_STORAGE[ $var_name ], $before, $key );
		} else {
			tornados_array_insert_before( $TORNADOS_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'tornados_storage_push_array' ) ) {
	function tornados_storage_push_array( $var_name, $key, $value ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $TORNADOS_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $TORNADOS_STORAGE[ $var_name ][ $key ] ) ) {
				$TORNADOS_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $TORNADOS_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'tornados_storage_pop_array' ) ) {
	function tornados_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $TORNADOS_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $TORNADOS_STORAGE[ $var_name ] ) && is_array( $TORNADOS_STORAGE[ $var_name ] ) && count( $TORNADOS_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $TORNADOS_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $TORNADOS_STORAGE[ $var_name ][ $key ] ) && is_array( $TORNADOS_STORAGE[ $var_name ][ $key ] ) && count( $TORNADOS_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $TORNADOS_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'tornados_storage_inc_array' ) ) {
	function tornados_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( empty( $TORNADOS_STORAGE[ $var_name ][ $key ] ) ) {
			$TORNADOS_STORAGE[ $var_name ][ $key ] = 0;
		}
		$TORNADOS_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'tornados_storage_concat_array' ) ) {
	function tornados_storage_concat_array( $var_name, $key, $value ) {
		global $TORNADOS_STORAGE;
		if ( ! isset( $TORNADOS_STORAGE[ $var_name ] ) ) {
			$TORNADOS_STORAGE[ $var_name ] = array();
		}
		if ( empty( $TORNADOS_STORAGE[ $var_name ][ $key ] ) ) {
			$TORNADOS_STORAGE[ $var_name ][ $key ] = '';
		}
		$TORNADOS_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'tornados_storage_call_obj_method' ) ) {
	function tornados_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $TORNADOS_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $TORNADOS_STORAGE[ $var_name ] ) ? $TORNADOS_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $TORNADOS_STORAGE[ $var_name ] ) ? $TORNADOS_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'tornados_storage_get_obj_property' ) ) {
	function tornados_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $TORNADOS_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $TORNADOS_STORAGE[ $var_name ]->$prop ) ? $TORNADOS_STORAGE[ $var_name ]->$prop : $default;
	}
}
