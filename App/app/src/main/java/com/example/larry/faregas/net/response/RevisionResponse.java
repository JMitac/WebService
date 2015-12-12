package com.example.larry.faregas.net.response;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class RevisionResponse {
    private String message;
    private Object revision;

    public RevisionResponse(String message, Object revision) {
        this.message = message;
        this.revision = revision;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public Object getRevision() {
        return revision;
    }

    public void setRevision(Object revision) {
        this.revision = revision;
    }
}
