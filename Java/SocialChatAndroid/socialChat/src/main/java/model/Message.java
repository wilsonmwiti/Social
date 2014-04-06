package model;

/**
 * Created by Alexandre on 04/04/2014.
 */
public class Message {

    public int id;

    public String author;

    public String message;

    /** Construct
     *
     */
    public Message() {
    }

    /** Full construct
     *
     * @param id
     * @param author
     * @param message
     */
    public Message(int id, String author, String message) {
        this.id = id;
        this.author = author;
        this.message = message;
    }

    /** Retrieve id field
     *
     * @return
     */
    public int getId() {
        return id;
    }

    /** Set id field
     *
     * @param id
     */
    public void setId(int id) {
        this.id = id;
    }

    /** Retrieve author field
     *
     * @return
     */
    public String getAuthor() {
        return author;
    }

    /** Set author field
     *
     * @param author
     */
    public void setAuthor(String author) {
        this.author = author;
    }

    /** Retrieve message field
     *
     * @return
     */
    public String getMessage() {
        return message;
    }

    /** Set message field
     *
     * @param message
     */
    public void setMessage(String message) {
        this.message = message;
    }
}
