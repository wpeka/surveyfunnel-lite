/**
 * @jest-environment jsdom
 */

 import React from 'react';
 import { mount, shallow } from 'enzyme';
import {ModalContext,ModalContextProvider} from '../../../Components/Context/ModalContext';

test("ModalContext",()=>{
        const wrapper=shallow(<ModalContextProvider />)    
})
