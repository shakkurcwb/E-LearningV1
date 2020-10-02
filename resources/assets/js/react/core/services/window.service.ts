export class WindowService {
    /**
     * Get Element Value By ID.
     * @returns Any
     */
    static getElementValueByID(id: string) {
        return window.document.getElementById(id).value;
    }
}