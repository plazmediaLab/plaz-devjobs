import React from 'react';
import ReactDOM from 'react-dom';

const Items = ({ skills }) => {

    console.log(skills);

    return (
        <h1>React component</h1>
    );
};

export default Items;

if (document.getElementById('example')) {
    ReactDOM.render(<Items />, document.getElementById('example'));
}
