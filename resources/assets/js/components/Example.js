import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Example extends Component {
    render() {
        return (
            <div>
               
                <h3>Tu Ultima Prubea:</h3>
                
                <h4><b>Clasificacion:</b> {window.clasificacion} </h4>
                <h4><b>IMC:</b> {window.imc}</h4>
            </div>
        );
    }
}

export default Example;


if (document.getElementById('last-imc')) {
    ReactDOM.render(<Example />, document.getElementById('last-imc'));
}

