import React, { useState } from 'react';

export const ModificarProducto = () => {
  const [formData, setFormData] = useState({
    ID: '',
    MARCA: '',
    TALLA: '',
    COLOR: '',
    TIPO: '',
    STOCK: '',
    STOCKMIN: '',
    STOCKMAX: '',
    CC: '',
    CV: ''
  });

  const [message, setMessage] = useState('');

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch('http://localhost/react-proyecto/src/php/modificar-producto.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams(formData)
      });

      if (response.ok) {
        const result = await response.text();
        setMessage(result);
      } else {
        const errorText = await response.text();
        setMessage(errorText);
      }
    } catch (error) {
      setMessage('Error de conexión');
    }
  };

  return (
    <div className="w3-container w3-margin-top">
      <div className="w3-card-4 w3-light-blue w3-padding-large">
        <h2>Modificar Calzado</h2>
        <form onSubmit={handleSubmit} className="w3-container">
          {Object.keys(formData).map((key) => (
            <div key={key} className="w3-section">
              <label htmlFor={key} className="w3-text-blue">{key}</label>
              <input
                className="w3-input w3-border"
                type="text"
                id={key}
                name={key}
                value={formData[key]}
                onChange={handleChange}
                required
              />
            </div>
          ))}
          <button type="submit" className="w3-button w3-red w3-margin-top">Actualizar</button>
        </form>
        {message && <p className="w3-text-red">{message}</p>}
      </div>
    </div>
  );
};

export default ModificarCalzado;
