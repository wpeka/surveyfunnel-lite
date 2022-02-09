/**
 * ModalContext JS.
 *
 * @since 1.0.0
 * @package Surveyfunnel_Lite/Components/Context
 */

// @codingStandardsIgnoreStart
import { createContext, Component } from "react";
import { useState } from "react";
import React from 'react';

export function ModalContextProvider( props ) {

	// state to show or hide modal.
	const [ showModal, setShowModal ] = useState( false );
	// state to set current element
	const [ currentElement, setCurrentElement ] = useState( {} );
	const getShowModal                          = () => {
		return showModal;
	}
	const value                                 = {
		showModal, setShowModal, currentElement, setCurrentElement, getShowModal
	}
	return(
		<ModalContext.Provider
			value                               = {value}
		>
			{props.children}
		</ ModalContext.Provider >
	);
}

export const ModalContext = createContext();
// @codingStandardsIgnoreEnd