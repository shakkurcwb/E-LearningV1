export interface JsonAdapter {

    /**
     * Generate a object from json resources.
     */
    fromJson(props: any): this;

    /**
     * Generate a json resource from an object.
     */
    toJson(): any;
}