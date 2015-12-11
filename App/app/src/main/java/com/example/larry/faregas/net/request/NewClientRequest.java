package com.example.larry.faregas.net.request;

import com.example.larry.faregas.models.Client;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class NewClientRequest {

    private String cli_cod;
    private String cli_dni;
    private String cli_nombre;
    private String cli_pater;
    private String cli_mater;
    private String cli_telf;
    private String cli_email;
    private String cli_direccion;
    private String cli_tipvehiculo;
    private String cli_marca;
    private String cli_model;
    private String cli_placa;

    public NewClientRequest(String cli_cod, String cli_dni, String cli_nombre, String cli_pater, String cli_mater, String cli_telf, String cli_email, String cli_direccion, String cli_tipvehiculo, String cli_marca, String cli_model, String cli_placa) {
        this.cli_cod = cli_cod;
        this.cli_dni = cli_dni;
        this.cli_nombre = cli_nombre;
        this.cli_pater = cli_pater;
        this.cli_mater = cli_mater;
        this.cli_telf = cli_telf;
        this.cli_email = cli_email;
        this.cli_direccion = cli_direccion;
        this.cli_tipvehiculo = cli_tipvehiculo;
        this.cli_marca = cli_marca;
        this.cli_model = cli_model;
        this.cli_placa = cli_placa;
    }

    public Client parseToClient(){
        Client client = new Client();
        client.setCodigo(this.cli_cod);
        client.setDni(this.cli_dni);
        client.setFoto("");
        client.setNombre(this.cli_nombre);
        client.setPaterno(this.cli_pater);
        client.setMaterno(this.cli_mater);
        client.setTelefono(this.cli_telf);
        client.setEmail(this.cli_email);
        client.setDireccion(this.cli_direccion);
        client.setTipoVehiculo(this.cli_tipvehiculo);
        client.setMarca(this.cli_marca);
        client.setModelo(this.cli_model);
        client.setPlaca(this.cli_placa);
        client.setFecha("2015-12-12 00:00:00");
        return client;
    }
}
