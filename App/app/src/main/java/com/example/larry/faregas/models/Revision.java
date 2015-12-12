package com.example.larry.faregas.models;

import java.io.Serializable;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class Revision implements Serializable {

    private String cliCodigo;
    private String motor;
    private String tubo;
    private String bujias;
    private String bobinas;
    private String radiador;
    private String mangeras;
    private String filtros;
    private String check;

    public Revision() {
    }

    public Revision(String cliCodigo, String motor, String tubo, String bujias, String bobinas, String radiador, String mangeras, String filtros, String check) {
        this.cliCodigo = cliCodigo;
        this.motor = motor;
        this.tubo = tubo;
        this.bujias = bujias;
        this.bobinas = bobinas;
        this.radiador = radiador;
        this.mangeras = mangeras;
        this.filtros = filtros;
        this.check = check;
    }

    public String getCliCodigo() {
        return cliCodigo;
    }

    public void setCliCodigo(String cliCodigo) {
        this.cliCodigo = cliCodigo;
    }

    public String getMotor() {
        return motor;
    }

    public void setMotor(String motor) {
        this.motor = motor;
    }

    public String getTubo() {
        return tubo;
    }

    public void setTubo(String tubo) {
        this.tubo = tubo;
    }

    public String getBujias() {
        return bujias;
    }

    public void setBujias(String bujias) {
        this.bujias = bujias;
    }

    public String getBobinas() {
        return bobinas;
    }

    public void setBobinas(String bobinas) {
        this.bobinas = bobinas;
    }

    public String getRadiador() {
        return radiador;
    }

    public void setRadiador(String radiador) {
        this.radiador = radiador;
    }

    public String getMangeras() {
        return mangeras;
    }

    public void setMangeras(String mangeras) {
        this.mangeras = mangeras;
    }

    public String getFiltros() {
        return filtros;
    }

    public void setFiltros(String filtros) {
        this.filtros = filtros;
    }

    public String getCheck() {
        return check;
    }

    public void setCheck(String check) {
        this.check = check;
    }
}
