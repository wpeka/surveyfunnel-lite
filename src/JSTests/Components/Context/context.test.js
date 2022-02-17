/**
 * Test Files JS.
 *
 * @since 1.0.0
 * @package Surveyfunnel_Lite/JSTests
 */

// @codingStandardsIgnoreStart
//Phpcs doesn't support ReactJS and Phpcbf messes the code,so we cant use it.
/**
 * @jest-environment jsdom
 */

 import React from 'react';
 import { mount, shallow } from 'enzyme';
import {ModalContext,ModalContextProvider} from '../../../Components/Context/ModalContext';

test("ModalContext",()=>{
        const wrapper=shallow(<ModalContextProvider />)    
})
// @codingStandardsIgnoreEnd
