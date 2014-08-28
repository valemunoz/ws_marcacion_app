CREATE TABLE app_cliente_marcacion (
    id_cliente integer NOT NULL,
    nombre character varying(300),
    estado numeric(1,0)
);


ALTER TABLE public.app_cliente_marcacion OWNER TO "3455_moxup";

--
-- Name: app_marcador; Type: TABLE; Schema: public; Owner: 3455_moxup; Tablespace: 
--

CREATE TABLE app_marcador (
    id_marca integer NOT NULL,
    dni character varying(30),
    nombre character varying(300),
    fecha timestamp without time zone,
    tipo numeric,
    imagen character varying(300),
    cliente numeric,
    app character varying(300),
    apm character varying(300),
    nombre_completo character varying(500)
);


ALTER TABLE public.app_marcador OWNER TO "3455_moxup";

--
-- Name: app_marcador_id_marca_seq; Type: SEQUENCE; Schema: public; Owner: 3455_moxup
--

CREATE SEQUENCE app_marcador_id_marca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.app_marcador_id_marca_seq OWNER TO "3455_moxup";

--
-- Name: app_marcador_id_marca_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: 3455_moxup
--

ALTER SEQUENCE app_marcador_id_marca_seq OWNED BY app_marcador.id_marca;


--
-- Name: app_usuario_marcacion; Type: TABLE; Schema: public; Owner: 3455_moxup; Tablespace: 
--

CREATE TABLE app_usuario_marcacion (
    id_usuario integer NOT NULL,
    nombre character varying(300),
    mail character varying(300),
    clave character varying(10),
    estado numeric(1,0),
    fecha_registro timestamp without time zone,
    cliente numeric
);


ALTER TABLE public.app_usuario_marcacion OWNER TO "3455_moxup";

--
-- Name: cliente_marcacion_app_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: 3455_moxup
--

CREATE SEQUENCE cliente_marcacion_app_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_marcacion_app_id_cliente_seq OWNER TO "3455_moxup";

--
-- Name: cliente_marcacion_app_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: 3455_moxup
--

ALTER SEQUENCE cliente_marcacion_app_id_cliente_seq OWNED BY app_cliente_marcacion.id_cliente;
