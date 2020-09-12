import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';

export default function SuccessMessage({ message }){

  const component = useRef(null);

  useEffect(() => {
    if (message) {
      const h = component.current.clientHeight;
      document.getElementById('send-message').style.height = `${h}px`;
      setTimeout(() => {
        document.getElementById('send-message').style.height = '0px';
      }, 10000);
    }
  }, [message]);

  return (
    <React.Fragment>
      <h2 className="p-3 flex items-center justify-center h-full" ref={ component }>
        <svg className="w-5 h-5 inline-block mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" /></svg>
        { message }
      </h2>
    </React.Fragment>
  );
};

if (document.getElementById('send-message')) {
  ReactDOM.render(<SuccessMessage message={message} />, document.getElementById('send-message'));
}