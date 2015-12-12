package com.example.larry.faregas.net.response;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class ClientAllResponse {

    private String message;
    private Object clients;

    public ClientAllResponse(String message, Object clients) {
        this.message = message;
        this.clients = clients;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public Object getClients() {
        return clients;
    }

    public void setClients(Object clients) {
        this.clients = clients;
    }
}
